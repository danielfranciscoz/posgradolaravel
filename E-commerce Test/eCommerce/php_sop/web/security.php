<?php

define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY', 'b623f1ffe4524be9b160af6589c0557b0e5083d81f19413c87f44d3fa282cd3b512300f1e7d348b19fc425c1336e1b75f8e34c50f137432488c23014919d1e2f18a1242a708646da99af0b512c1b9617e95d42bd978d48439c46b80a242ddf6a0a346478ef6741968b393b2e6e71df8709b56b71e373453c8a800962d15711b3');

function sign ($params) {
  return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}

?>
