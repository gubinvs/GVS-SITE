import php from "gulp-connect-php";  

export const phpServer = () => {
    php.server({base:`${app.path.build.php}`, port:8010, keepalive:true}); 
} 