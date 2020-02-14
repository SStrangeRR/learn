<?php

namespace framework\core;

class FileUploader
{
    public static function upload($data)
    {
        $filePath = $data['img']['tmp_name'];
        $errorCode = $data['img']['error'];

        if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {
            return 'error';
        }

        $fi = finfo_open(FILEINFO_MIME_TYPE);
        $mime = (string)finfo_file($fi, $filePath);
        finfo_close($fi);

        if (strpos($mime, 'image') === false) return 'error';

        $image = getimagesize($filePath);
        $name = md5_file($filePath);
        $extension = image_type_to_extension($image[2]);
        $format = str_replace('jpeg', 'jpg', $extension);

        if (!move_uploaded_file($filePath, WWW . '/images/posts/' . $name . $format)) {
            return 'error';
        } else {
            return $name . $format;
        }
    }
}