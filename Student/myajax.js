$(document).ready(function(){

    show_Data();
    function show_Data()
    {
        let output = '';
        $.ajax({
            url: "retrieve.php",
            method:'get',
             dataType: 'json',
            success: function (response) {
                console.log(response);
                x = response;
                for(i=0;i<x.length;i++)
                {
                    output+='<div class="col-sm-5">';
                    output+='<div class="card mt-5" style="width: 33rem; margin-right:39pc;">';
                    output+='<div class="row">';
                    output+='<div class="col-sm-3">';
                    output+='<img class="card-img-top mt-5 p-4" src="../Admin/uploadf/'+x[i].fac_image+'" alt="Card image cap">';
                    output+='</div>';
                    output+=' <div class="col-sm-9">';
                    output+='<div class="card-body">';
                    output+='<h5 class="card-title">'+x[i].fac_name+'</h5>';
                    output+='<p class="card-text">';
                    output+=''+x[i].fac_name+'';
                    output+='</h5>';
                    output+='<h6 class="card-subtitle mb-2 text-muted">';
                    output+=''+x[i].regno+'';
                    output+='</h6>';
                    output+='<p class="card-text">';
                    output+='Email:'+x[i].fac_email+'';
                    output+='<br>';
                    output+='Gender:'+x[i].fac_gender+'';
                    output+='<br>';
                    output+='Address:';
                    output+=''+x[i].fac_address+'';
                    output+='</p>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    
                    //output+='<div class="col-xl-3 col-lg-4 col-md-6 mb-4 h-100"><div class="bg-white rounded shadow-sm"><img src="images/" alt="" class="img-fluid card-img-top" width="100px" height="100px"></a><div class="p-4"><h5> <a href="#" class="text-dark">fg</a></h5><p class="small text-muted mb-0">vgv</p><div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4"><p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">ctg</span></p><div class="badge badge-danger px-3 rounded-pill font-weight-normal">New</div></div></div></div></div>';

                }
                $("#tbody").html(output);
            }
    
        });
    }


});

function myfunc1()
{
    let output = ''
    let given = $('#mytxt').val();
    mydata = {name: given};

    $.ajax({
        url: "search.php",
        method: 'post',
        data: mydata,
        dataType: 'json',
        success: function (data) {
            x = data;
            for(i=0;i<x.length;i++)
            {
                // output += "<tr><td>"+x[i].fac_name+"</td><td>"+x[i].fac_phone+"</td><td>"+x[i].fac_email+"</td></tr>";
                output+='<div class="col-sm-5">';
                    output+='<div class="card mt-5" style="width: 33rem; margin-right:39pc;">';
                    output+='<div class="row">';
                    output+='<div class="col-sm-3">';
                    output+='<img class="card-img-top mt-5 p-4" src="../Admin/uploadf/'+x[i].fac_image+'" alt="Card image cap">';
                    output+='</div>';
                    output+=' <div class="col-sm-9">';
                    output+='<div class="card-body">';
                    output+='<h5 class="card-title">'+x[i].fac_name+'</h5>';
                    output+='<p class="card-text">';
                    output+=''+x[i].fac_name+'';
                    output+='</h5>';
                    output+='<h6 class="card-subtitle mb-2 text-muted">';
                    output+=''+x[i].regno+'';
                    output+='</h6>';
                    output+='<p class="card-text">';
                    output+='Email:'+x[i].fac_email+'';
                    output+='<br>';
                    output+='Gender:'+x[i].fac_gender+'';
                    output+='<br>';
                    output+='Address:';
                    output+=''+x[i].fac_address+'';
                    output+='</p>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
            }
            $("#tbody").html(output);
        }
    });
}