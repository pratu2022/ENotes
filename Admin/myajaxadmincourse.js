$(document).ready(function(){

    //show_Data();
    function show_Data()
    {
        let output = '';
        $.ajax({
            url: "fetch.php",
            method:'get',
             dataType: 'json',
            success: function (response) {
                console.log(response);
                x = response;
                for(i=0;i<x.length;i++)
                {
                    output+='<div class="col-xl-3 col-md-6 col-12 ">';
                    output+='<div class="d-flex justify-content-center align-items-center">';
                    output+='<div class="card mt-2" style="width: 18rem;>';
                    output+='<div class="row">';
                    output+='<div class="d-flex justify-content-between">';
                    output+='<p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i></p>';
                    output+='<p class="small text-grey ">'+x[i].ac_year+'</p>';
                    output+='</div>';
                    output+='<div class="col-sm-3">';
                    output+='</div>';
                    output+=' <div class="col-sm-9">';
                    output+='<div class="card-body">';
                    output+='<h5 class="card-title">'+x[i].subject_name+'</h5>';
                    output+='<p class="card-text">';
                    output+=''+x[i].allocated_faculty+'';
                    output+='</h5>';
                    output+='<h6 class="card-subtitle mb-2 text-muted">';
                    //output+=''+x[i].allocated_faculty+'';
                    output+='</h6>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    // 
                    // output+=' <div class="col-xl-3 col-md-6 col-12 ">';
                    // output+='<div class="d-flex justify-content-center align-items-center">';
                    // output+='<div class="card" style="width: 18rem;">';
                    //     output+=' <img alt="..." class="card-img-top" src="./images/1.png">';
                    //      output+='<div class="card-body">';
                    //         output+='<div class="d-flex justify-content-between">';

                    //            output+=' <p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i></p>';
                    //            output+=' <p class="small text-grey ">'+x[i].allocated_faculty+'</p>';
                    //        output+=' </div>';
                    //         output+='<h5 class="card-title mt-3">'+x[i].allocated_faculty+'</h5>';

                    //         output+='<p class="card-text mt-2 mb-3">'+x[i].allocated_faculty+'</p>';
                           
                    //      output+='</div>';
                    //      output+=' </div></div>';
                    
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
    let given = $('#year').val();
    //alert(given);
    mydata = {name: given};

    $.ajax({
        url: "fetchyear.php",
        method: 'post',
        data: mydata,
        dataType: 'json',
        success: function (data) {
            x = data;
            for(i=0;i<x.length;i++)
            {
                    output+='<div class="col-xl-3 col-md-6 col-12">';
                    output+='<div class="d-flex justify-content-center align-items-center">';
                    output+='<div class="card mt-3" style="width: 18rem;>';
                    output+='<div class="card-body">';
                    output+='<div class="d-flex justify-content-between p-3">';
                    output+='<p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i></p>';
                    output+='<p class="small text-grey">'+x[i].ac_year+'</p>';
                    output+='</div>';
                    output+='<h5 class="card-title" style="margin-left:1pc;">'+x[i].subject_name+'</h5>';
                    output+='<p class="card-text mb-4" style="margin-left:1pc;">';
                    output+=''+x[i].allocated_faculty+'</p>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    
            }
            $("#tbody").html(output);
        },
        
    });
}

function myfunc2()
{
    let output = '';
    let given = $('#type').val();
    alert(given);
    mydata = {name: given};

    $.ajax({
        url: "fetchtype.php",
        method: 'post',
        data: mydata,
        dataType: 'json',
        success: function (data) {
            x = data;
            for(i=0;i<x.length;i++)
            {
                    output+='<div class="col-xl-3 col-md-6 col-12">';
                    output+='<div class="d-flex justify-content-center align-items-center">';
                    output+='<div class="card mt-3" style="width: 18rem;>';
                    output+='<div class="card-body">';
                    output+='<div class="d-flex justify-content-between p-3">';
                    output+='<p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i></p>';
                    output+='<p class="small text-grey">'+x[i].ac_year+'</p>';
                    output+='</div>';
                    output+='<h5 class="card-title text-info" style="margin-left:1pc;">'+x[i].subject_name+'</h5>';
                    output+='<p class="card-text  mb-4" style="margin-left:1pc;">';
                    //output+=''+x[i].allocated_faculty+'</p>';
                    output+='<a class="btn btn-dark" href="#">Read More</a>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    
            }
            $("#tbody").html(output);
        },
        
    });
}

function myfunc3()
{
    let output = ''
    let given = $('#faculty').val();
    //alert(given);
    mydata = {name: given};

    $.ajax({
        url: "fetchfaculty.php",
        method: 'post',
        data: mydata,
        dataType: 'json',
        success: function (data) {
            x = data;
            for(i=0;i<x.length;i++)
            {
                    output+='<div class="col-xl-3 col-md-6 col-12">';
                    output+='<div class="d-flex justify-content-center align-items-center">';
                    output+='<div class="card mt-3" style="width: 18rem;>';
                    output+='<div class="card-body">';
                    output+='<div class="d-flex justify-content-between p-3">';
                    output+='<p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i></p>';
                    output+='<p class="small text-grey">'+x[i].ac_year+'</p>';
                    output+='</div>';
                    output+='<h5 class="card-title" style="margin-left:1pc;">'+x[i].subject_name+'</h5>';
                    output+='<p class="card-text  mb-4" style="margin-left:1pc;">';
                    output+=''+x[i].allocated_faculty+'</p>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    output+='</div>';
                    
            }
            $("#tbody").html(output);
        },
        
    });
}

function pagination(pagenumber,id)
{
	$(".page-item").removeClass('active');
	
	$("#"+id).addClass('active');
	
	$.ajax({
		
		url:'data.php',
		method:'POST',
		data:{'page':pagenumber},
		success:function(response)
		{
			$("#tbody").html(response);
		}
		
	})
}