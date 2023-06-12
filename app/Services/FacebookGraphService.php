<?php

namespace App\Services;

use Facebook\Facebook;

class FacebookGraphService
{
    protected $graph;

    public function __construct()
    {
        $this->graph = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => 'v17.0',
        ]);
    }

    public function getCampaigns()
    {
        $pageId = env('FACEBOOK_PAGE_ID');
        $pageToken = env('FACEBOOK_PAGE_ACCESS_TOKEN');
        $response = $this->graph->get("/$pageId?fields=leadgen_forms&access_token=$pageToken");
        return $response->getGraphNode()->asArray();
    }

    public function getLeads($campaignId)
    {
        $pageToken = env('FACEBOOK_PAGE_ACCESS_TOKEN');
        $response = $this->graph->get("/$campaignId/leads?access_token=$pageToken");
        return $response->getGraphEdge()->asArray();
    }

    public function getLimitedLeads($campaignId , $limit)
    {
        $pageToken = env('FACEBOOK_PAGE_ACCESS_TOKEN');
        $response = $this->graph->get("/$campaignId/leads?limit=$limit&access_token=$pageToken");
        return $response->getGraphEdge()->asArray();
    }


    public function getPageOrLeadInfo($pageorleadId)
    {
        $pageToken = env('FACEBOOK_PAGE_ACCESS_TOKEN');
        $response = $this->graph->get("/$pageorleadId?access_token=$pageToken");
        return $response->getGraphNode()->asArray();
    }

}
