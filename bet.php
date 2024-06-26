<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://sports.sportingbet.com/cds-api/bettingoffer/fixtures?x-bwin-accessid=MjcxNjZlZTktOGZkNS00NWJjLTkzYzgtODNkNThkNzZhZDg2&lang=pt-br&country=BR&userCountry=BR&fixtureTypes=Standard&state=Latest&offerMapping=Filtered&offerCategories=Gridable&fixtureCategories=Gridable%2CNonGridable%2COther&sportIds=4&regionIds=42&competitionIds=&conferenceIds=&isPriceBoost=false&statisticsModes=None&skip=0&take=50&sortBy=Tags",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_COOKIE => "__cf_bm=061.ygusFi36Vwc2VDREjnEaN9jskWzpQbNJMKOOH3U-1714530912-1.0.1.1-6vh859KVrQ0AMd5m6thCOp6k2_H493bM2CpEPppYtow2Z.fTDYZ0rkEsflW4oGFwcgUnjroUiZoQl8B2BCw3v53oMn2opasvKaMdFsyaAJo; _cfuvid=rChphNyxtOWAwFYX5d343N46xkZ4Q1uOHVB.eJxR2NY-1714530912733-0.0.1.1-604800000",
  CURLOPT_HTTPHEADER => [
    "user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 OPR/108.0.0.0"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}