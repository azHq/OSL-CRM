<?php

namespace App\Services;

use App\Models\MetaCredential;
use Facebook\Facebook;

class FacebookGraphService
{
    protected $graph;
    public $meta;

    public function __construct()
    {
        $this->meta = MetaCredential::first();
        $this->graph = new Facebook([
            'app_id' => $this->meta->app_id,
            'app_secret' => $this->meta->app_secret,
            'default_graph_version' => 'v17.0',
        ]);
    }

    public function getCampaigns()
    {
        $pageId = $this->meta->page_id;
        $pageToken = $this->meta->page_token;
        $response = $this->graph->get("/$pageId?fields=leadgen_forms&access_token=$pageToken");
        return $response->getGraphNode()->asArray();
    }

    public function getLeads($campaignId)
    {
        $pageToken = $this->meta->page_token;
        $response = $this->graph->get("/$campaignId/leads?access_token=$pageToken");
        return $response->getGraphEdge()->asArray();
    }

    public function getLimitedLeads($campaignId, $limit)
    {
        $pageToken = $this->meta->page_token;
        $response = $this->graph->get("/$campaignId/leads?limit=$limit&access_token=$pageToken");
        return $response->getGraphEdge()->asArray();
    }


    public function getPageOrLeadInfo($pageorleadId)
    {
        $pageToken = $this->meta->page_token;
        $response = $this->graph->get("/$pageorleadId?access_token=$pageToken");
        return $response->getGraphNode()->asArray();
    }
}
