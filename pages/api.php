<?php
/* function ambilData()
{
    $url = "http://localhost:8080/api/emp/read.php";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}  */


// function kirimData($data)
// {
//     $url = "http://localhost:8080/api/emp/create.php";
//     $data = array(
//         "nama" => $data['nama'],
//         "username" => $data['username'],
//         "password" => $data['password'],
//         "jenis" => $data['jenis'],
//     );

//     $curl = curl_init();
//     curl_setopt($curl, CURLOPT_URL, $url);
//     curl_setopt($curl, CURLOPT_POST, 1);
//     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//     $response = curl_exec($curl);
//     echo $response;
// }


// if (isset($_GET)) {
//     function hapus($id)
//     {
//         $data = "http://localhost:8080/api/emp/delete.php?id=$id;";
//         if ($data) {
//             header("location:index.php");
//         }
//     }
// }
// header("location:index.php");
