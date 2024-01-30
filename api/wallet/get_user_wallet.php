<?php

$wallet = empty($profile) ? [] : select_rows("SELECT * FROM user_accounts WHERE profileId = '" . $profile["id"] . "'")[0];
