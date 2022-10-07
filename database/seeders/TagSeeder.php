<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            "fashionblogger",
            "styleblogger",
            "lookbook",
            "fashionblog",
            "styleblog",
            "fashionista",
            "fashioninspo",
            "styleinspo",
            "ootd",
            "streetfashion",
            "livecolorfully",
            "livethelittlethings",
            "darlingmovement",
            "lifestyle",
            "livingglam",
            "lifetips",
            "loveyourlife",
            "liveyourlife",
            "amwriting",
            "amediting",
            "askagent",
            "wordgasm",
            "writersofinstagram",
            "writersoftwitter",
            "writinglife",
            "creativewriting",
            "IndieAuthors",
            "selfpublishing",
            "storystarter",
            "writersblock",
            "writingtips",
            "writersnetwork",
            "SMM",
            "SEO",
            "analytics",
            "digitalmarketing",
            "onlinemarketing",
            "internetmarketing",
            "inboundmarkeitng",
            "emailmarketing",
            "optimization",
            "socialmedia",
            "trending",
            "leadgen",
            "leadgeneration",
            "SMMtips",
            "growthhacks",
            "designblogger",
            "graphicdesign",
            "graphicdesigncentral",
            "designbyme",
            "designinspiration",
            "designporn",
            "designinspo",
            "designoftheday",
            "fineart",
            "mommylife",
            "daddylife",
            "parentlife",
            "mommybloggers",
            "daddybloggers",
            "parentingbloggers",
            "parentingblogger",
            "mommytips",
            "daddytips",
            "parentingtips",
            "motherhoodunplugged",
            "mommyproblems",
            "parentingreality",
            "dailyparenting",
            "familylife",
            "picoftheday",
            "photooftheday",
            "potd",
            "photodaily",
            "vscocam",
            "vsco",
            "photomasters",
            "bestofvsco",
            "canonphotography",
            "nikonphotography",
            "fujifilmphotography",
            "portrait",
            "landscape",
            "thousandwords",
            "travelblog",
            "travelblogger",
            "travelbloggers",
            "travelphoto",
            "adventure",
            "landscape",
            "cityscape",
            "traveler",
            "welivetoexplore",
            "fitfam",
            "fitnessblogger",
            "trainhard",
            "fitnessgoals",
            "healthylifestyle",
            "practiceandalliscoming",
            "personaltrainer",
            "eatclean",
            "cleaneating",
            "nopainnogain",
            "recipe",
            "foodlovers",
            "foodgasm",
            "foodporn",
            "foodphotography",
            "foodblogger",
            "nomnom",
            "vegan",
            "glutenfree",
            "lactosefree",
        ];

        foreach ($tags as  $value) {
            DB::table('tags')->insert([
                'name' =>  $value,
            ]);
        }
    }
}
