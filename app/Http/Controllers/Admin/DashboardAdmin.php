<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;
use App\Company;
use App\Product;
use App\Media;

class DashboardAdmin extends Controller
{
    public function showDashboard()
    {
        $browser = Analytics::fetchTopBrowsers(Period::years(1));
        $mostVisitedPage = Analytics::fetchMostVisitedPages(Period::days(90),$maxResults = 10);
        $visitor = Analytics::performQuery(
            Period::days(30),
            'ga:users',
            [
                'metrics' => 'ga:users, ga:sessions, ga:pageviews',
                'dimensions' => 'ga:day'
            ]
        );
        $visitorByCity = Analytics::performQuery(
            Period::years(1),
            'ga:users',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:city',
                'sort' => '-ga:users',
                'max-results' => 5
            ]
        );
        $top['media'] = Media::count();
        $top['product'] = Product::count();
        $top['company'] = Company::count();
        // print_r($visitor);
        return view('admin.dashboard',compact('mostVisitedPage','visitor','top','visitorByCity'));
    }
}
