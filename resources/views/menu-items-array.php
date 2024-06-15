<?php
return [
	[
	 'url' => 'usa-nri-news', 'text' => 'USA NRI News', 'dropdown' => true, 
        'items' => [
		    ['url' => 'community', 'text' => 'USA Cities'],
            ['url' => 'bayarea', 'text' => 'Bay Area'],
            ['url' => 'newjersey', 'text' => 'New Jersey'],
            ['url' => 'washingtondc', 'text' => 'Washington DC'],
            ['url' => 'dallas', 'text' => 'Dallas'],
            ['url' => 'newyork', 'text' => 'New York'],
        ],
    ], 
	[
        'url' => 'politics', 'text' => 'Politics', 'dropdown' => true,
        'items' => [
            ['url' => 'navyandhra', 'text' => 'Navyandhra'],
            ['url' => 'telangana', 'text' => 'Telangana'],
            ['url' => 'national', 'text' => 'National'],
            ['url' => 'usapolitics', 'text' => 'USA Politics'],
            ['url' => 'international', 'text' => 'International'],
			 ['url' => 'political-interview', 'text' => 'Political Interviews'],
			 ['url' => 'political-articles', 'text' => 'Political Articles']
        ],
    ],
	 [
        'url' => 'cinemas', 'text' => 'Cinemas', 'dropdown' => true,
        'items' => [
            ['url' => 'cinema-news', 'text' => 'Cinema News'],
			['url' => 'cinema-articles', 'text' => 'Cinema Articles'],
			['url' => 'cinema-interviews', 'text' => 'Cinema Interviews'],
            ['url' => 'cinema-reviews', 'text' => 'Cinema Reviews'],
            ['url' => 'cinema-news-usa', 'text' => 'USA Cinema News'],
            ['url' => 'cinema-trailers', 'text' => 'Trailers'],
        ],
    ],
	[
        'url' => '#', 'text' => 'Videos', 'dropdown' => true,
        'items' => [
            ['url' => 'videos', 'text' => 'Cinema Videos'],
            ['url' => 'videos/nri', 'text' => 'NRI Videos'],
        ],
    ],
	['url' => 'news-folders', 'text' => 'News Folders', 'dropdown' => false],
    ['url' => 'religious', 'text' => 'Religious', 'dropdown' => false],
	[
        'url' => 'realestate', 'text' => 'Real Estate', 'dropdown' => true, 
        'items' => [
            ['url' => 'bnews', 'text' => 'Business'],
            ['url' => 'realestate', 'text' => 'Real Estate'],
            ['url' => 'shopping', 'text' => 'Shopping'],
        ],
    ],
      
    [
        'url' => '#', 'text' => 'Gallery', 'dropdown' => true,
        'items' => [
            ['url' => 'gallery/america', 'text' => 'America'],
            ['url' => 'gallery/cinema', 'text' => 'Cinema'],
            ['url' => 'gallery/political', 'text' => 'Political'],
			['url' => 'archives', 'text' => 'Archives', 'dropdown' => false],
        ],
    ],
//	['url' => 'epaper', 'text' => 'Epaper', 'dropdown' => false],
];
