<?php

require 'vendor/autoload.php';

// $BookTitles = new Sirolad\LinkedList();
// $BookTitles->insert("Introduction to Algorithm");
// $BookTitles->insert("Introduction to PHP and Data structures");
// $BookTitles->insert("Programming Intelligence");
// $BookTitles->insertAtFirst("Mediawiki Administrative tutorial guide");
// $BookTitles->insertBefore("Introduction to Calculus", "Programming Intelligence");
// $BookTitles->insertAfter("Introduction to Calculus", "Programming Intelligence");


// foreach ($BookTitles as $title) {
//     echo $title . "\n";
// }


// for ($BookTitles->rewind(); $BookTitles->valid(); $BookTitles->next()) {
//     echo $BookTitles->current() . "\n";
// }
//


try {
    $programmingBooks = new Sirolad\Books(10);
    $programmingBooks->push("Introduction to PHP7");
    $programmingBooks->push("Mastering JavaScript");
    $programmingBooks->push("MySQL Workbench tutorial");
    echo $programmingBooks->pop()."\n";
    echo $programmingBooks->top()."\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
