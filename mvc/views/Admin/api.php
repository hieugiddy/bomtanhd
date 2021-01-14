<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header">
            <h2><i class="halflings-icon white font"></i><span class="break"></span>Danh sách API hỗ trợ</h2>
        </div>
        <div class="box-content">
            <div class="page-header">
                <h1>Sau đây là 1 số nguồn cấp dữ liệu mà trang hỗ trợ. Mọi dữ liệu đều trả về dạng JSON</h1>
            </div> 
            <div class="row-fluid">
                <div class="span12">
                <h2>Lấy danh sách tất cả phim</h2>
                <p>Cấu trúc link: http://domain.com/bomtanhd/API/XuatAllPhim/<strong>'số trang'</strong></p>
                <div class="tooltip-demo well">
                    <p class="muted" style="margin-bottom: 0;">
                        Trả về DS phim mỗi lần trả về là 24 phim, để chuyển trang ta truyền <strong>'số trang'</strong> vào link trên.
                        <a target="_blank" href="/bomtanhd/API/XuatAllPhim/0" style="color:blue"><u>Xem Demo</u></a>
                    </p>
                </div> 
                
                <h2>Lấy thông tin chi tiết phim thông qua slug</h2>
                <p>Cấu trúc link: http://domain.com/bomtanhd/API/XuatPhim/<strong>'slug'</strong></p>
                <div class="tooltip-demo well">
                    <p class="muted" style="margin-bottom: 0;">
                        Trả về thông tin chi tiết về 1 bộ phim mà ta truyền ở <strong>'slug'</strong> vào link trên.
                        <a target="_blank" href="/bomtanhd/API/XuatPhim/ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020" style="color:blue"><u>Xem Demo</u></a>
                    </p>
                </div> 

                <h2>Lấy thông tin chi tiết về diễn viên, đạo diễn</h2>
                <p>Cấu trúc link: http://domain.com/bomtanhd/API/XuatInfoActor/<strong>'slug'</strong></p>
                <div class="tooltip-demo well">
                    <p class="muted" style="margin-bottom: 0;">
                        Trả về thông tin chi tiết về 1 diễn viên/đạo diễn mà ta truyền ở <strong>'slug'</strong> vào link trên.
                        <a target="_blank" href="/bomtanhd/API/XuatInfoActor/thanh-long" style="color:blue"><u>Xem Demo</u></a>
                    </p>
                </div> 

                </div>
            </div>
        </div>  
    </div>
</div>