<?php
/** Fonction qui lit le fichier et remplace les donné nécésaire */

function supExt ($file_name) {
    $trouve_moi = ".";
    $position = strpos($file_name, $trouve_moi);
    return substr($file_name, 0, $position);
}

function loadFileAndReplaceData($pathToFile): string
{
    $webPage = file_get_contents($pathToFile);
    if (!$webPage){
        throw new Error("Fail to load content !");
    }
    return str_replace("%host%", $_SERVER['SERVER_NAME'], $webPage);
}

function returnTxtFile($pathToFile): void
{
    try {
        $webPage = loadFileAndReplaceData($pathToFile);
        header("Content-Type: text/plain; charset=UTF-8");
        echo $webPage;
    } catch (Exception $e){
        errorPage();
    } finally {
        exit;
    }
}

function returnHtmlFile($pathToFile): void
{
    try {
        $webPage = loadFileAndReplaceData($pathToFile);
        header("Content-Type: text/html; charset=UTF-8");
        echo $webPage;
    } catch (Exception $e){
        errorPage();
    } finally {
        exit;
    }
}

function returnCssFile($pathToFile): void
{
    try {
        $webPage = loadFileAndReplaceData($pathToFile);
        //header("Cache-Control: max-age=31536000");
        header("Content-Type: text/css; charset=UTF-8");
        echo $webPage;
    } catch (Exception $e){
        errorPage();
    } finally {
        exit;
    }
}

function returnJsFile($pathToFile): void
{
    try {
        $webPage = loadFileAndReplaceData($pathToFile);
        //header("Cache-Control: max-age=31536000");
        header("Content-Type: application/javascript; charset=UTF-8");
        echo $webPage;
    } catch (Exception $e){
        errorPage();
    } finally {
        exit;
    }
}

function returnImmage($pathToImage): void
{
    try {
        $pathInfo = pathinfo($pathToImage);
        $imageBinnaire = fopen($pathToImage, 'rb');
        //header("Cache-Control: max-age=31536000");
        header("Content-Type: image/".$pathInfo['extension']);
        header("Content-Length: " . filesize($pathToImage));
        fpassthru($imageBinnaire);
    } catch (Exception $e){
        errorPage();
    } finally {
        exit;
    }
}

/**
 * @throws Exception
 */
function returnImageFromDatabase($id){
    if(is_numeric($id)){
        include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/../Modele/getImage.Controlleur");
        $arrImage = getImageFromId($id);
        //header("Cache-Control: max-age=31536000");
        header("Content-Type: image/".$arrImage['extension']);
        header("Content-Length: " . $arrImage['lenght']);
        echo $arrImage['data'];
    } else {
        throw new Exception("Isnt a integer");
    }
}

function returnFont($pathToFont): void
{
    try {
        $pathInfo = pathinfo($pathToFont);
        $fontFile = fopen($pathToFont, 'rb');
        //header("Cache-Control: max-age=31536000");
        header("Content-Type: font/".$pathInfo['extension']);
        header("Content-Length: " . filesize($pathToFont));
        fpassthru($fontFile);
    } catch (Exception $e){
        errorPage();
    } finally {
        exit;
    }
}

function errorPage(){
    http_response_code(402);
    exit;
}