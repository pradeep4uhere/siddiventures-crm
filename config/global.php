<?php
// define path

$public_path = public_path();           // /var/www/html/marketadmin/public
$files_path = $public_path.'/files';
$base_path = base_path();               // /var/www/html/marketadmin

$public_url = env('APP_URL');    // http://marketadmin.localhost/
$files_url = $public_url.'files/';
$assets_url = $public_url.'assets/';

$localmode = false;
if(env('APP_ENV') == 'local') {
    $localmode = true;
}

//Set all the Directory Path
//Upload all images
$loaderImg = "";
//Business Images
$uploadDir='uploads';
$bannerDir='banner';


$businessDir='business_logo';
$businessLogoDir='logo';
$businessLogoThumbDir='thumbnail';
$businessLogoDirPath=$uploadDir.DIRECTORY_SEPARATOR.$businessDir.DIRECTORY_SEPARATOR.$businessLogoDir;
$businessLogoThumbDirPath=$uploadDir.DIRECTORY_SEPARATOR.$businessDir.DIRECTORY_SEPARATOR.$businessLogoThumbDir;
$businessThumbWidth='100';
$businessThumbHeight='100';

$productDir='product';
$productUploadDir=$uploadDir.DIRECTORY_SEPARATOR.$productDir;
$productMainDir='main';
$productThumbDir='thumbnail';
$productDirPath=$uploadDir.DIRECTORY_SEPARATOR.$productDir.DIRECTORY_SEPARATOR.$productMainDir;
$productThumbDirPath=$uploadDir.DIRECTORY_SEPARATOR.$productDir.DIRECTORY_SEPARATOR.$productThumbDir;
$productWidth='150';
$productHeight='150';
$productSideWidth='530';
$productSideHeight='383';
$productThumbWidth='2000';
$productThumbHeight='1124';






$jobDir='job';
$jobUploadDir=$uploadDir.DIRECTORY_SEPARATOR.$jobDir;
$jobMainDir='main';
$jobThumbDir='thumbnail';
$jobDirPath=$uploadDir.DIRECTORY_SEPARATOR.$jobDir.DIRECTORY_SEPARATOR.$jobMainDir;
$jobThumbDirPath=$uploadDir.DIRECTORY_SEPARATOR.$jobDir.DIRECTORY_SEPARATOR.$jobThumbDir;
$jobWidth='150';
$jobHeight='150';
$jobSideWidth='530';
$jobSideHeight='383';
$jobThumbWidth='1920';
$jobThumbHeight='800';


$sellerDir='seller';
$sellerUploadDir=$uploadDir.DIRECTORY_SEPARATOR.$sellerDir;
$sellerMainDir='main';
$sellerThumbDir='thumbnail';
$sellerDirPath=$uploadDir.DIRECTORY_SEPARATOR.$sellerDir.DIRECTORY_SEPARATOR.$sellerMainDir;
$sellerThumbDirPath=$uploadDir.DIRECTORY_SEPARATOR.$sellerDir.DIRECTORY_SEPARATOR.$sellerThumbDir;
$sellerWidth='500';
$sellerHeight='500';
$sellerThumbWidth='200';
$sellerThumbHeight='200';


$pageContentDir='pagecontent';
$pageContentUploadDir=$uploadDir.DIRECTORY_SEPARATOR.$pageContentDir;

$pageContentMainDir='main';
$pageContentThumbDir='thumbnail';

$pageContentDirPath=$uploadDir.DIRECTORY_SEPARATOR.$pageContentDir.DIRECTORY_SEPARATOR.$pageContentMainDir;
$pageContentThumbDirPath=$uploadDir.DIRECTORY_SEPARATOR.$pageContentDir.DIRECTORY_SEPARATOR.$pageContentThumbDir;

$pageContent250PXWidth='250';
$pageContent250PXHeight='250';

$pageContent500PXWidth='500';
$pageContent500PXHeight='550';

$pageContentImageDefaultWidth='1920';
$pageContentImageDefaultHeight='800';


$themeDir = 'theme';
$resumeDir = 'resume';

return [

    'PAGE_CONTENT_UPLOAD_DIR'=>$pageContentDir,

    'PAGE_CONTENT_DIR'=>public_path($pageContentDir),
    'PAGE_CONTENT_UPLOAD_DIR'=>public_path($pageContentUploadDir),
    
    'PAGE_CONTENT_IMG_DIR'=>public_path($pageContentDir),
    'PAGE_CONTENT_THUMB_DIR'=>public_path($pageContentThumbDir),
    
    'PAGE_CONTENT_IMG_250PX_WIDTH'=>$pageContent250PXWidth,
    'PAGE_CONTENT_IMG_250PX_HEIGHT'=>$pageContent250PXHeight,

    'PAGE_CONTENT_IMG_500PX_WIDTH'=>$pageContent500PXWidth,
    'PAGE_CONTENT_IMG_500PX_HEIGHT'=>$pageContent500PXHeight,

    'PAGE_CONTENT_IMG_DEFAULT_WIDTH'=>$pageContentImageDefaultWidth,
    'PAGE_CONTENT_IMG_DEFAULT_HEIGHT'=>$pageContentImageDefaultHeight,

    'PAGE_CONTENT_IMG_URL'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$pageContentDir,
    'PAGE_CONTENT_THUMB_IMG'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$pageContentThumbDir,
    
    'PAGE_CONTENT_IMG_GALLERY'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$uploadDir.DIRECTORY_SEPARATOR.$pageContentDir,

    'PAGE_CONTENT_IMG_BANNER'=>'/storage'.DIRECTORY_SEPARATOR.$uploadDir.DIRECTORY_SEPARATOR.$pageContentDir,
  



    'LOGO'=>$public_url.'/public/theme/prssystem/img/front/logo1.png',
    'LOADER'=>$public_url.'/public/img/load.gif',
    'CLIENT_SECRET'=>env('CLIENT_SECRET'),
    'THEMECMS'=>$public_url.'/'.'public'.'/'.$themeDir,
    'CMS'=>$public_url.'/'.'public'.'/',
    'BACKENDCMS'=>$public_url.'/public',
    'ADMIN_URL_CSS'=>$public_url.'/public/assets/css/',
    'ADMIN_URL_JS'=>$public_url.'/public/assets/js/',
    'ADMIN_URL_IMAGE'=>$public_url.'/public/assets/img/',

    'THEME_URL_CSS'=>$public_url.'/public/theme/prssystem/css',
    'THEME_URL_JS'=>$public_url.'/public/theme/prssystem/js',
    'THEME_URL_IMAGE'=>$public_url.'/public/theme/prssystem/img',
    
    'THEME_URL_FRONT_CSS'=>$public_url.'/public/theme/prssystem/css/front',
    'THEME_URL_FRONT_JS'=>$public_url.'/public/theme/prssystem/js/front',
    'THEME_URL_FRONT_IMAGE'=>$public_url.'/public/theme/prssystem/img/front',
    
    'UPLOAD_DIR'=>public_path($uploadDir),
    'BUSINESS_DIR'=>public_path($businessDir),
    'BUSINESS_IMG_DIR'=>public_path($businessLogoDirPath),
    'BUSINESS_THUMB_DIR'=>public_path($businessLogoThumbDirPath),
    'BUSINESS_THUMB_WIDTH'=>$businessThumbWidth, // set thumbnail height of the image
    'BUSINESS_THUMB_HEIGHT'=>$businessThumbHeight, // set thumbnail width of the image
    'IMG_EXT'=>array('jpeg','png','jpg','gif','svg'), // set thumbnail width of the image
    'BUSINESS_THUMB_IMG'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$uploadDir.DIRECTORY_SEPARATOR.$businessDir.DIRECTORY_SEPARATOR.$businessLogoThumbDir,
    
    'PRODUCT_DIR'=>public_path($productDir),
    'PRODUCT_UPLOAD_DIR'=>public_path($productUploadDir),
    'PRODUCT_IMG_DIR'=>public_path($productDirPath),
    'PRODUCT_THUMB_DIR'=>public_path($productThumbDirPath),
    'PRODUCT_IMG_WIDTH'=>$productWidth,
    'PRODUCT_IMG_HEIGHT'=>$productHeight,
    'PRODUCT_THUMB_IMG_WIDTH'=>$productThumbWidth,
    'PRODUCT_THUMB_IMG_HEIGHT'=>$productThumbHeight,
    'PRODUCT_IMG_URL'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$productDirPath,
    'PRODUCT_THUMB_IMG'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$productThumbDirPath,
    'PRODUCT_IMG_GALLERY'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$uploadDir.DIRECTORY_SEPARATOR.$productDir,



   
    

    'JOB_DIR'=>public_path($jobDir),
    'JOB_UPLOAD_DIR'=>public_path($jobUploadDir),
    'JOB_IMG_DIR'=>public_path($jobDirPath),
    'JOB_THUMB_DIR'=>public_path($jobThumbDirPath),
    'JOB_IMG_WIDTH'=>$jobWidth,
    'JOB_IMG_HEIGHT'=>$jobHeight,
    'JOB_THUMB_IMG_WIDTH'=>$jobThumbWidth,
    'JOB_THUMB_IMG_HEIGHT'=>$jobThumbHeight,
    'JOB_IMG_URL'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$jobDirPath,
    'JOB_THUMB_IMG'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$jobThumbDirPath,
    'JOB_IMG_GALLERY'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$uploadDir.DIRECTORY_SEPARATOR.$jobDir,
    
	
	'SELLER_DIR'=>public_path($sellerDir),
    'SELLER_UPLOAD_DIR'=>public_path($sellerUploadDir),
    'SELLER_IMG_DIR'=>public_path($sellerDirPath),
    'SELLER_THUMB_DIR'=>public_path($sellerThumbDirPath),
    'SELLER_IMG_WIDTH'=>$sellerWidth,
    'SELLER_IMG_HEIGHT'=>$sellerHeight,
    'SELLER_THUMB_IMG_WIDTH'=>$sellerThumbWidth,
    'SELLER_THUMB_IMG_HEIGHT'=>$sellerThumbHeight,
    'SELLER_IMG_URL'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$sellerDirPath,
    'SELLER_THUMB_IMG'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$sellerThumbDirPath,
    'SELLER_IMG_GALLERY'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$uploadDir.DIRECTORY_SEPARATOR.$sellerDir,

    'PAGE_IMG_BANNER'=>'/storage'.DIRECTORY_SEPARATOR.$uploadDir.DIRECTORY_SEPARATOR.$bannerDir,
    'PAGE_IMG_WIDTH'=>$productWidth,
    'PAGE_IMG_HEIGHT'=>$productHeight,
    'PAGE_THUMB_IMG_WIDTH'=>$productThumbWidth,
    'PAGE_THUMB_IMG_HEIGHT'=>$productThumbHeight,



    


    'JOB_IMG_BANNER'=>'/storage'.DIRECTORY_SEPARATOR.$uploadDir.DIRECTORY_SEPARATOR.$bannerDir,
    'JOB_RESUME'=>$public_url.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'/storage'.DIRECTORY_SEPARATOR.$uploadDir.DIRECTORY_SEPARATOR.$resumeDir,
    'JOB_IMG_WIDTH'=>$jobWidth,
    'JOB_IMG_HEIGHT'=>$jobHeight,
    'JOB_THUMB_IMG_WIDTH'=>$jobThumbWidth,
    'JOB_THUMB_IMG_HEIGHT'=>$jobThumbHeight,
    
    
];

?>
