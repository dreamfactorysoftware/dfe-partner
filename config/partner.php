<?php
/**
 * @return array The partner configuration
 */
return [
    'partner-id' => [
        //  Short name of the partner
        'name'         => 'Partner',
        //  Allowed referrer TLDs to talk to partner (keep hubspot and df in there)
        'referrers'    => ['partner.com', 'hubspot.com', 'dreamfactory.com'],
        //  Allowed commands for this partner. Not required, but helpful if you wish to use a single endpoint
        'commands'     => [
            //  Just a command name
            'command-1',
            'command-2',
            //  A command with pre-defined data (i.e. secure keys for services from env, etc.)
            ['command' => 'command-3', 'option1' => 'value1', 'option2' => 'value2'],
        ],
        //  An optional description of the partner
        'description'  => 'A proud partner of DreamFactory Software, Inc.',
        //  Optional redirect URL for after-request send-off
        'redirect-uri' => null,
        //  Branding information for content
        'brand'        => [
            //  Logo, size doesn't matter. Resize with css
            'logo'      => '/logo/uri',
            //  Icon, again, same thing as above with size
            'icon'      => '/icon/uri',
            //  Full copyright notice, if any
            'copyright' => '&copy; ' . date('Y') . ' Verizon',
            //  A smaller, compact, copyright notice, if different from full
            //'copyright-minimal' => '&copy; ' . date('Y') . ' Verizon',
            //  Any copy for help/body of branding area
            'copy'      => <<< HTML
<p>You really need to click the button down there.</p><p class="pull-right">
<form method="POST" action="/partner/partner-id">
    <input type="hidden" name="command" value="command-1">
    <button type="button" class="btn btn-warning">Do it <strong>NOW</strong>!</button></p><div style="clear: both"></div>
</form>
HTML
            ,
            //  Compact version of copy, if any
            //'copy-minimal'      => '<span>Hi</span>',
        ],
    ],
];