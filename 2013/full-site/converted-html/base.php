<?php

class Shropgeek
{

    public function getWinners()
    {
        $attendees = $this->getAttendees();

        $attendees = json_decode($attendees);

        for($i = 1; $i <= 8; $i++)
        {
            $number = mt_rand(1, count($attendees));

            $attendees2[] = $attendees[$number];

            unset($attendees[$number]);
        }

        return json_encode($attendees2);
    }

    public function getAttendees()
    {
        $pages = 2;

        for($i = 1; $i <= $pages; $i++)
        {
            $url = 'http://lanyrd.com/2013/shroprev/attendees/?page='.$i;
            $html = file_get_contents($url);
            
            $dom = new DomDocument();
            $dom->loadHTML($html);
            $finder = new DomXPath($dom);

            $attendees[$i] = $this->attendees($finder);
        }
        
        
        $final = array_merge($attendees[1], $attendees[2]);
        shuffle($final);

        return json_encode($final);
    }

    private function attendees($finder)
    {
        $pics = $finder->query("//div[@class='avatar avatar-profile']/a/img");
        $urls = $finder->query("//a[@class='icon twitter']");
        $names = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' name ')]");
        $bio = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' profile-desc ')]");

        for($i = 0; $i < $names->length; $i++)
        {

            $attendees[] = array(

                    #'url' => trim($urls->item($i)->getAttribute('href')),
                    'name' => trim($names->item($i)->textContent),
                    'bio' => trim($bio->item($i)->textContent),
                    'pic' => trim($pics->item($i)->getAttribute('src'))

                );
        }

        return $attendees;
    }

}