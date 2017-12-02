<?php

// Safe Search and Replace on Database with Serialized Data v1.0.1

// This script is to solve the problem of doing database search and replace
// when developers have only gone and used the non-relational concept of
// serializing PHP arrays into single database columns.  It will search for all
// matching data on the database and change it, even if it's within a serialized
// PHP array.

// The big problem with serialised arrays is that if you do a normal DB
// style search and replace the lengths get mucked up.  This search deals with
// the problem by unserializing and reserializing the entire contents of the
// database you're working on.  It then carries out a search and replace on the
// data it finds, and dumps it back to the database.  So far it appears to work
// very well.  It was coded for our WordPress work where we often have to move
// large databases across servers, but I designed it to work with any database.
// Biggest worry for you is that you may not want to do a search and replace on
// every damn table - well, if you want, simply add some exclusions in the table
// loop and you'll be fine.  If you don't know how, you possibly shouldn't be
// using this script anyway.

// To use, simply configure the settings below and off you go.  I wouldn't
// expect the script to take more than a few seconds on most machines.

// BIG WARNING!  Take a backup first, and carefully test the results of this code.
// If you don't, and you vape your data then you only have yourself to blame.
// Seriously.  And if you're English is bad and you don't fully understand the
// instructions then STOP.  Right there.  Yes.  Before you do any damage.

// USE OF THIS SCRIPT IS ENTIRELY AT YOUR OWN RISK.  I/We accept no liability from its use.

// Written 20090525 by David Coveney of Interconnect IT Ltd (UK)
// http://www.davesgonemental.com or http://www.interconnectit.com or
// http://spectacu.la and released under the WTFPL
// ie, do what ever you want with the code, and I take no responsibility for it OK?
// If you don't wish to take responsibility, hire me through Interconnect IT Ltd
// on +44 (0)151 331 5140 and we will do the work for you, but at a cost, minimum 1hr
// To view the WTFPL go to http://sam.zoy.org/wtfpl/ (WARNING: it's a little rude, if you're sensitive)

// Version 1.0.1 - styling and form added by James R Whitehead.

// Credits:  moz667 at gmail dot com for his recursive_array_replace posted at
//           uk.php.net which saved me a little time - a perfect sample for me
//           and seems to work in all cases.

//  Start TIMER
//  -----------
$stimer = explode( ' ', microtime() );
$stimer = $stimer[1] + $stimer[0];
//  -----------

// Database Settings

if (file_exists(dirname(__FILE__) . '/wp-load.php')) {
	define('DOING_AJAX', true); //Stop cron running.
	define('WP_USE_THEMES', false);
	include (dirname(__FILE__) . '/wp-load.php');
	$host = DB_HOST;			// normally localhost, but not necessarily.
	$usr  = DB_USER;       		// your db userid
	$pwd  = DB_PASSWORD;        // your db password
	$db   = DB_NAME;			// your database
} else {
	$host = 'localhost';        // normally localhost, but not necessarily.
	$usr  = 'yourdbuser';       // your db userid
	$pwd  = '';                 // your db password
	$db   = 'yourdb';           // your database
}


// Replace options

$search_for   = '';  // the value you want to search for
$replace_with = '';  // the value to replace it with
if (isset($_POST['search']) && $search_for == '') {
	$search_for  = stripcslashes($_POST['search']);
}

if (isset($_POST['replace']) && $replace_with == '') {
	$replace_with  = stripcslashes($_POST['replace']);
}

if ($search_for == '' || $replace_with == '' || $replace_with == $search_for) {
	@header('Content-Type: text/html; charset=UTF-8');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:dc="http://purl.org/dc/terms/" dir="ltr" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
	<title>Search and replace DB.</title>
	<style type="text/css">
	body {
		background-color: #E5E5E5;
		font-size: 12px
	}

	form {
		display:block;
		width: 400px;
		padding: 10px;
		margin: 50px auto;
		border:solid 10px #ccc;
		background-color: #F5F5F5;
	}

	fieldset {
		border: 0 none;
	}

	label {
		font-weight: bold;
		display:block;
		line-height: 2em;
	}

	input.text {
		margin-bottom: 1em;
		display:block;
		width: 90%;
	}

	input.button {
	}

	div.help {
		border-top: 1px dashed #999999;
		margin-top: 20px;
		padding-top: 10px
	}

	</style>
</head>
<body>
	<form action="<?php echo basename(__FILE__)?>" method="post">
		<fieldset>
			<label for="search_text">Search for:</label>
			<input id="search_text" type="text" name="search" value="<?php echo $search_for == '' ? get_bloginfo('home') : $search_for; ?>" class="text"/>
			<label for="replac_text">Replace with:</label>
			<input id="replac_text" type="text" name="replace" value="<?php echo $replace_with; ?>" class="text"/>
			<input type="submit" class="button" value="Search and replace" onclick="if (confirm('Are you really REALLY sure you want to do that?')){return true;}return false;"/>
			<div class="help">
				<h4><a href="http://spectacu.la">Spectacu.la</a> Safe Search and Replace on Database with Serialized Data v1.0.1</h4>
				<p>This script is to solve the problem of doing database search and replace
				when developers have only gone and used the non-relational concept of
				serializing PHP arrays into single database columns.  It will search for all
				matching data on the database and change it, even if it's within a serialized
				PHP array.</p>

				<p>The big problem with serialised arrays is that if you do a normal DB
				style search and replace the lengths get mucked up.  This search deals with
				the problem by unserializing and reserializing the entire contents of the
				database you're working on.  It then carries out a search and replace on the
				data it finds, and dumps it back to the database.  So far it appears to work
				very well.  It was coded for our WordPress work where we often have to move
				large databases across servers, but I designed it to work with any database.
				Biggest worry for you is that you may not want to do a search and replace on
				every damn table - well, if you want, simply add some exclusions in the table
				loop and you'll be fine.  If you don't know how, you possibly shouldn't be
				using this script anyway.</p>

				<p>To use, simply configure the settings below and off you go.  I wouldn't
				expect the script to take more than a few seconds on most machines.</p>

				<p><strong style="color:red">BIG WARNING!</strong> Take a backup first, and carefully test the results of this code.
				If you don't, and you vape your data then you only have yourself to blame.
				Seriously.  And if you're English is bad and you don't fully understand the
				instructions then STOP.  Right there.  Yes.  Before you do any damage.
				And don't forget - <strong style="color:red">delete this utility from your
				server after use.  It represents a major security threat to your database if
				maliciously used.</strong></p>

				<p><strong>USE OF THIS SCRIPT IS ENTIRELY AT YOUR OWN RISK. <br/> We accept no liability from its use.</strong></p>
			</div>
		</fieldset>
	</form>
</body>
</html>
<?php die;
}

$cid = mysql_connect($host,$usr,$pwd);

if (!$cid) { echo("Connecting to DB Error: " . mysql_error() . "<br/>"); }

// First, get a list of tables

$SQL = "SHOW TABLES";
$tables_list = mysql_db_query($db, $SQL, $cid);

if (!$tables_list) {
    echo("ERROR: " . mysql_error() . "<br/>$SQL<br/>"); }


// Loop through the tables

while ($table_rows = mysql_fetch_array($tables_list)) {

    $count_tables_checked++;

    $table = $table_rows['Tables_in_'.$db];

    echo '<br/>Checking table: '.$table.'<br/>***************<br/>';  // we have tables!

    $SQL = "DESCRIBE ".$table ;    // fetch the table description so we know what to do with it
    $fields_list = mysql_db_query($db, $SQL, $cid);

    // Make a simple array of field column names

    $index_fields = "";  // reset fields for each table.
    $column_name = "";
    $table_index = "";
    $i = 0;

    while ($field_rows = mysql_fetch_array($fields_list)) {

        $column_name[$i++] = $field_rows['Field'];

        if ($field_rows['Key'] == 'PRI') $table_index[$i] = true ;

    }

//    print_r ($column_name);
//    print_r ($table_index);

// now let's get the data and do search and replaces on it...

    $SQL = "SELECT * FROM ".$table;     // fetch the table contents
    $data = mysql_db_query($db, $SQL, $cid);

    if (!$data) {
        echo("ERROR: " . mysql_error() . "<br/>$SQL<br/>"); }


    while ($row = mysql_fetch_array($data)) {

        // Initialise the UPDATE string we're going to build, and we don't do an update for each damn column...

        $need_to_update = false;
        $UPDATE_SQL = 'UPDATE '.$table. ' SET ';
        $WHERE_SQL = ' WHERE ';

        $j = 0;

        foreach ($column_name as $current_column) {
            $j++;
            $count_items_checked++;

//            echo "<br/>Current Column = $current_column";

            $data_to_fix = $row[$current_column];
            $edited_data = $data_to_fix;            // set the same now - if they're different later we know we need to update

//            if ($current_column == $index_field) $index_value = $row[$current_column];    // if it's the index column, store it for use in the update

            $unserialized = unserialize($data_to_fix);  // unserialise - if false returned we don't try to process it as serialised

            if ($unserialized) {

//                echo "<br/>unserialize OK - now searching and replacing the following array:<br/>";
//                echo "<br/>$data_to_fix";
//
//                print_r($unserialized);

                recursive_array_replace($search_for, $replace_with, $unserialized);

                $edited_data = serialize($unserialized);

//                echo "**Output of search and replace: <br/>";
//                echo "$edited_data <br/>";
//                print_r($unserialized);
//                echo "---------------------------------<br/>";

              }

            else {

                if (is_string($data_to_fix)) $edited_data = str_replace($search_for,$replace_with,$data_to_fix) ;

                }

            if ($data_to_fix != $edited_data) {   // If they're not the same, we need to add them to the update string

                $count_items_changed++;

                if ($need_to_update != false) $UPDATE_SQL = $UPDATE_SQL.',';  // if this isn't our first time here, add a comma
                $UPDATE_SQL = $UPDATE_SQL.' '.$current_column.' = "'.mysql_real_escape_string($edited_data).'"' ;
                $need_to_update = true; // only set if we need to update - avoids wasted UPDATE statements

            }

            if ($table_index[$j]){
                $WHERE_SQL = $WHERE_SQL.$current_column.' = "'.$row[$current_column].'" AND ';
            }
        }

        if ($need_to_update) {

            $count_updates_run;

            $WHERE_SQL = substr($WHERE_SQL,0,-4); // strip off the excess AND - the easiest way to code this without extra flags, etc.

            $UPDATE_SQL = $UPDATE_SQL.$WHERE_SQL;
            echo $UPDATE_SQL.'<br/><br/>';

            $result = mysql_db_query($db,$UPDATE_SQL,$cid);

            if (!$result) {
                    echo("ERROR: " . mysql_error() . "<br/>$UPDATE_SQL<br/>"); }

        }

    }

}

// Report

$report = $count_tables_checked." tables checked; ".$count_items_checked." items checked; ".$count_items_changed." items changed;";
echo '<p style="margin:auto; text-align:center">';
echo $report;

mysql_close($cid);

//  End TIMER
//  ---------
$etimer = explode( ' ', microtime() );
$etimer = $etimer[1] + $etimer[0];
printf( "<br/>Script timer: <b>%f</b> seconds.", ($etimer-$stimer) );
echo '</p>';
//  ---------

function recursive_array_replace($find, $replace, &$data) {

    if (is_array($data)) {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                recursive_array_replace($find, $replace, $data[$key]);
            } else {
                // have to check if it's string to ensure no switching to string for booleans/numbers/nulls - don't need any nasty conversions
                if (is_string($value)) $data[$key] = str_replace($find, $replace, $value);
            }
        }
    } else {
        if (is_string($data)) $data = str_replace($find, $replace, $data);
    }

}


?>
