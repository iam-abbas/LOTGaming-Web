<?php
function getStatus($ip)
{
    $json = file_get_contents('http://api.steampowered.com/ISteamApps/GetServersAtAddress/v0001?addr=' . $ip . '&format=json'); // this WILL do an http request for you
    $data = json_decode($json, true);
    if (count($data["response"]["servers"]) > 0) {
        return 1;
    } else {
        return 0;
    }
}

$servers = [
    [
        "name" => "DM FFA MUMBAI",
        "ip" => "13.126.207.140:27016",
        "stats" => "http://lot.gameme.com/players/csgo"
    ],
    [
        "name" => "DM FFA SINGAPORE",
        "ip" => "18.138.207.58:27015",
        "stats" => ""
    ],
    [
        "name" => "DM FFA PISTOL IN",
        "ip" => "13.234.246.233:27015",
        "stats" => "https://lotgaming.xyz/stats/pistol/leaderboards.php"
    ],
    [
        "name" => "DM FFA PISTOL SG",
        "ip" => "54.169.58.125:27015",
        "stats" => ""
    ],
    [
        "name" => "RETAKE MUMBAI #1",
        "ip" => "35.154.26.9:27015",
        "stats" => "http://lot.gameme.com/players/csgo6"
    ],
    [
        "name" => "RETAKE MUMBAI #2",
        "ip" => "13.127.151.212:27015",
        "stats" => "http://lot.gameme.com/players/csgo4"
    ],
    [
        "name" => "RETAKE DELHI",
        "ip" => "13.126.207.141:27016",
        "stats" => "http://lot.gameme.com/players/csgo8"
    ],
    [
        "name" => "RETAKE BANGALORE",
        "ip" => "139.59.45.50:10008",
        "stats" => "http://lot.gameme.com/players/csgo2"
    ],
    [
        "name" => "LOTxMESL HUB RETAKE",
        "ip" => "13.234.107.47:27015",
        "stats" => ""
    ],
    [
        "name" => "EXECUTE MUMBAI #1",
        "ip" => "13.235.72.160:27015",
        "stats" => "http://lot.gameme.com/players/csgo3"
    ],
    [
        "name" => "EXECUTE MUMBAI #2",
        "ip" => "13.235.183.140:27015",
        "stats" => ""
    ],
    [
        "name" => "AWP CASUAL MUMBAI",
        "ip" => "15.206.24.33:27015",
        "stats" => "http://lot.gameme.com/players/csgo5"
    ],
    [
        "name" => "1V1 ARENA MUMBAI",
        "ip" => "13.232.146.33:27000",
        "stats" => "http://lot.gameme.com/players/csgo7"
    ]
];




foreach ($servers as $sv) {
    echo '
<div class="col-6 col-md-6">
    <div class="player-info-detail player-info-detail--icon">

        <div class="player-info-detail__body">
            <div class="row">
                <div class="col-6 server-left">
                    <a href="javascript:void(0);" onclick="copyConnect(\'' . $sv['ip'] . '\')" class="helper">
                        <div class="player-info-detail__title">' . $sv['name'] . '</div>
                        
                        <div class="player-info-detail__label color-primary">' . $sv['ip'] . '
                        </div></a>
                    
                </div>
                <div class="col-6 server-right">
                ';

    if (getStatus($sv['ip']) == 1) {
        echo '<div class="status btn btn-sm btn-primary">ONLINE</div>';
    } else {
        echo '<div class="status offline btn btn-sm btn-primary">OFFLINE</div>';
    }


    echo '
                    <a href="' . $sv['stats'] . '" class="player-info-detail__link btn btn-sm btn-primary status-link" tabindex="-1">VIEW STATS</a>
                </div>
            </div>
        </div>

    </div>
</div>';
}
