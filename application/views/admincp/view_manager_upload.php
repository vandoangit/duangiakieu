<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<script type="text/javascript">
function ShowFileInfo_config( fileUrl, data ){
    
    var msg = 'The selected URL is: ' + fileUrl + '\n\n';
    if ( fileUrl != data['fileUrl'] )
        msg += 'File url: ' + data['fileUrl'] + '\n';
    msg += 'File size: ' + data['fileSize'] + 'KB\n';
    msg += 'Last modifed: ' + data['fileDate'];
    alert(msg);
}
</script>

<div id="content"> 
    <div class="title_admin_body">
        <div class="title_admin_body_left">
            <div class="title_admin_body_right">
                <?php echo $title_function;?>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body_add" style="padding:5px;width:918px">
    <?php
        include(DIR_PUBLIC.'ckfinder/ckfinder.php');
        $finder = new CKFinder() ;
        $finder->Height='450';
        $finder->BasePath = base_url().DIR_PUBLIC.'ckfinder/' ;
        $finder->SelectFunction = 'ShowFileInfo_config' ;
        $finder->Create() ;
    ?>
    </div>
</div>