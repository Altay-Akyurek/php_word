<?php
    require_once("connet/connet.php");

    $insert = $db->prepare("INSERT INTO posts SET 
    title=:title,
    content=:content,
    created_at=:created_at");

    $data = array("title"=>"inşaat Teknolojileri",
    "content"=>"inşşat hızla gelişiyor",
    "created_at"=>"created_at"
    );
$result=$insert->execute($data);

if($result){
    echo "Ekleme Başarılı:";
}else{
    echo "Ekleme Başarısız:";
}

?>