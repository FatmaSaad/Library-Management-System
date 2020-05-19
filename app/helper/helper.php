<?php

//Json array response
function responseJson($status, $msg, $data = null, $state = 200)
{
    $response = [
        'status' => (int)$status,
        'message' => $msg,
        'data' => $data,
    ];
    return response()->json($response, $state);
}


function saveImage($file, $folder = '/')
{
    $fileName = date('YmdHis').'-'.$file->getClientOriginalName();
    $dest = public_path('uploads/' . $folder);
    $file->move($dest, $fileName);
    return 'uploads/' . $folder . '/' . $fileName;
}


function saveImageBase64($image, $folder = '/', $filename = 'image')
{
    $type = "png";
    //get the base-64 from data
    //$base64_str = substr($request->image, strpos($request->image, ",")+1);
    $data = base64_decode($image);
    if ($data === false) {
        return "";// throw new \Exception('base64_decode failed');
    }
    $fileName =  date('YmdHis').'-'.$filename.'.'.$type;
    $dest = public_path('uploads/' . $folder);
    $path = 'uploads/' . $folder . '/' . $fileName;
    if (!is_dir(public_path('uploads/' . $folder ))) {
      // dir doesn't exist, make it
      mkdir(public_path('uploads/' . $folder));
    }
    file_put_contents($dest.'/'.$fileName, $data);
    return 'uploads/' . $folder . '/' . $fileName;
}
