<?php

  return

  array(
    "base_url" => "http://localhost/tesis/Auth/auth_callback.php",
    "providers" => array(
      "Twitter" => array(
        "enabled" => true,
        "keys" => array(
          "key" => "bcs1uvSPOAseu5I7FQaIqBNfx",
          "secret" => "jTi7qTBiMxEt2VLxzs7FdOcej72efvBdvYQ0VmSmCHrTccuSwb"
        ),
        "includeEmail" => true,
      ),
      "Google" => array(
        "enabled" => true,
        "keys" => array(
          "id" => "5188078015-lvivpco684go0utm8knge5s8ecavcac3.apps.googleusercontent.com",
          "secret" => "GNMcInvr49touS4diMD7DsgX"
        ),
          "scope"   => "https://www.googleapis.com/auth/userinfo.email ". // optional
                       "https://www.googleapis.com/auth/userinfo.profile",
      )
    )
  )

 ?>
