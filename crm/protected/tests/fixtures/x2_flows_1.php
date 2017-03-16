<?php

return array(
	'flow1' => array(
        'id' => '1',
        'active' => '1',
        'name' => 'flow1',
        'triggerType' => 'RecordTagAddTrigger',
        'modelClass' => 'Accounts',
        'flow' => '{"version":"3.0.1","trigger":{"type":"RecordTagAddTrigger","options":{"modelClass":{"value":"Accounts"},"tags":{"value":"#successful"}},"modelClass":"Accounts"},"items":[{"type":"X2FlowEmail","options":{"from":{"value":"-1"},"to":{"value":""},"template":{"value":""},"subject":{"value":""},"cc":{"value":""},"bcc":{"value":""},"body":{"value":""}}}]}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
	'flow2' => array(
        'id' => '2',
        'active' => '1',
        'name' => 'flow2',
        'triggerType' => 'RecordTagAddTrigger',
        'modelClass' => 'Accounts',
        'flow' => '{"version":"3.0.1","trigger":{"type":"RecordTagAddTrigger","options":{"modelClass":{"value":"Accounts"},"tags":{"value":"#successful"}},"modelClass":"Accounts","conditions":[{"type":"attribute","name":"name","operator":"=","value":"account1"}]},"items":[{"type":"X2FlowCreateNotif","options":{"user":{"value":"admin"},"text":{"value":"test"}}}]}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
	'flow3' => array(
        'id' => '3',
        'active' => '1',
        'name' => 'flow3',
        'triggerType' => 'WebleadTrigger',
        'modelClass' => 'Contacts',
        'flow' => '{"version":"3.0.1","trigger":{"type":"WebleadTrigger","options":{"tags":{"value":"","operator":"="}},"modelClass":"Contacts","conditions":[{"type":"attribute","name":"leadSource","operator":"=","value":"Google"}]},"items":[{"type":"X2FlowCreateNotif","options":{"user":{"value":"admin"},"text":{"value":"test"}}}]}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
	'flow4' => array(
        'id' => '4',
        'active' => '1',
        'name' => 'flow4',
        'triggerType' => 'WebleadTrigger',
        'modelClass' => 'Contacts',
        'flow' => '{"version":"3.0.1","trigger":{"type":"WebleadTrigger","options":{"tags":{"value":"#successful","operator":"="}},"modelClass":"Contacts","conditions":[{"type":"attribute","name":"leadSource","operator":"=","value":"Google"}]},"items":[{"type":"X2FlowCreateNotif","options":{"user":{"value":"admin"},"text":{"value":"test"}}}]}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
	'flow5' => array(
        'id' => '5',
        'active' => '1',
        'name' => 'flow5',
        'triggerType' => 'NewsletterEmailClickTrigger',
        'flow' => '{"version":"3.0.1","trigger":{"type":"NewsletterEmailClickTrigger","options":{"campaign":{"value":""},"url":{"value":"","operator":"contains"}}},"items":[{"type":"X2FlowCreateNotif","options":{"user":{"value":"{assignedTo}"},"text":{"value":"test"}}}],"flowName":"test"}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
	'flow6' => array(
        'id' => '6',
        'active' => '1',
        'name' => 'flow6',
        'triggerType' => 'CampaignEmailClickTrigger',
        'modelClass' => 'Contacts',
        'flow' => '{"version":"3.0.1","trigger":{"type":"CampaignEmailClickTrigger","options":{"campaign":{"value":"Test Email Campaign_5"},"url":{"value":"test url","operator":"="}},"modelClass":"Contacts","conditions":[{"type":"attribute","name":"firstName","operator":"=","value":"Test1"}]},"items":[{"type":"X2FlowCreateNotif","options":{"user":{"value":"{assignedTo}"},"text":{"value":"test"}}}],"flowName":"test"}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
	'flow7' => array(
        'id' => '7',
        'active' => '1',
        'name' => 'flow7',
        'triggerType' => 'CampaignEmailClickTrigger',
        'modelClass' => 'Contacts',
        'flow' => '{"version":"3.0.1","trigger":{"type":"CampaignEmailClickTrigger","options":{"campaign":{"value":""},"url":{"value":"","operator":"="}},"modelClass":"Contacts"},"items":[{"type":"X2FlowCreateNotif","options":{"user":{"value":"{assignedTo}"},"text":{"value":"test"}}}],"flowName":"test"}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
	'flow8' => array(
        'id' => '8',
        'active' => '1',
        'name' => 'flow8',
        'triggerType' => 'RecordViewTrigger',
        'modelClass' => 'Contacts',
        'flow' => '{"version":"3.0.1","trigger":{"type":"RecordViewTrigger","options":{"modelClass":{"value":"Contacts"}},"modelClass":"Contacts","conditions":[{"type":"attribute","name":"company","operator":"=","value":"Aperture Science_3"}]},"items":[{"type":"X2FlowCreateNotif","options":{"user":{"value":"{assignedTo}"},"text":{"value":""}}}],"flowName":"test"}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
	'flow9' => array(
        'id' => '9',
        'active' => '1',
        'name' => 'flow9',
        'triggerType' => 'CampaignEmailOpenTrigger',
        'modelClass' => 'Contacts',
        'flow' => '{"version":"3.0.1","trigger":{"type":"CampaignEmailOpenTrigger","options":{"campaign":{"value":"Test Email Campaign"}},"modelClass":"Contacts"},"items":[{"type":"X2FlowCreateNotif","options":{"user":{"value":"{assignedTo}"},"text":{"value":""}}}],"flowName":"test"}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
	'flow10' => array(
        'id' => '10',
        'active' => '1',
        'name' => 'flow10',
        'triggerType' => 'CampaignUnsubscribeTrigger',
        'modelClass' => 'Contacts',
        'flow' => '{"version":"3.0.1","trigger":{"type":"CampaignUnsubscribeTrigger","options":{"campaign":{"value":"Test Email Campaign"}},"modelClass":"Contacts"},"items":[{"type":"X2FlowCreateNotif","options":{"user":{"value":"{assignedTo}"},"text":{"value":""}}}],"flowName":"test"}',
        'createDate' => 01389906490,
        'lastUpdated' => 01389906490,
	),
);
?>
