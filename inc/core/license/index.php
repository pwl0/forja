<?php
$act = array(
  "success" => true,
  "license" => "valid",
  "item_name" => "DooPlay",
  "user_id" => "1234",
  "payment_id" => "#1234",
  "customer_name" => "somename",
  "customer_email" => "somename@mail.com",
  "license_limit" => "100000",
  "site_count" => "125",
  "activations_left" => 99875,
  "expires" => "lifetime",
);
$checkar = array(
  "response" => true,
  "status" => "1",
  "credits" => "1000000",
  "requests" => "125486",
  "unlimited" => "0",
  "website" => "0",
  "dbmovies" => "active",
  "used_credits" => "20",
  "autoembed" => "10000",
);
$statsar = array(
  "response" => true,
  "status" => "1",
  "total_caching" => "1000000000",
  "total_sites" => "1254000086",
  "total_licenses" => "1000000000",
  "total_bannded_licenses" => "1000000",
  "total_requests" => "1022000002",
  "total_credits" => "20000000000",
  "total_used_credits" => "10000000",
);

$edd = (isset($_GET['edd_action']) && $_GET['edd_action']) ? $_GET['edd_action'] : '0';
$activate_license = $edd == "activate_license";
$check_license = $edd == "check_license";
$deactivate_license = $edd == "deactivate_license";

if ($activate_license != 0) {
  http_response_code(200);
  echo json_encode($act);
  exit;
}
if ($check_license != 0) {
  http_response_code(200);
  echo json_encode($act);
  exit;
}
if ($deactivate_license != 0) {
  http_response_code(200);
  echo json_encode(array("license" => "deactivated"));
  exit;
}
if (isset($_GET['check'])) {
  http_response_code(200);
  echo json_encode($checkar);
  exit;
}
if (isset($_GET['stats'])) {
  http_response_code(200);
  echo json_encode($statsar);
  exit;
} else {
  http_response_code(404);
  echo json_encode(
    array(
      "success" => true,
      "license" => "valid",
      "response" => true,
      "status" => "1",
    )
  );
  exit;
}
?>