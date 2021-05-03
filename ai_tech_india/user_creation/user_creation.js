$(document).ready(function () {
  if (jQuery('#user_creation_table').length != 0) {
    init_datatables();
  }
});


function init_datatables() {
  var file_name = 'User Creation';

  user_creation_datatable = jQuery('#user_creation_table').DataTable({
    stateSave  : true,
        "columnDefs": [
        { className: "td-text-right", "targets": [ 4] },
        { "width": "15%", "targets": 0 },
        { "width": "30%", "targets": 1 },
        { "width": "20%", "targets": 2 },
        { "width": "20%", "targets": 3 },
        { "width": "10%", "targets": 4 },
    ],
    "language": {
      "processing": '',
    },
    "paging": true,
    "bPaginate": true,
    "ordering": false,
    "processing": true,
    "serverSide": true,
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    "ajax": {
      url: "user_creation/curd.php",
      type: "POST",
      data: {
        "action": 'user_creation_table'
      }
    },
    "dom": 'lBfrtip',
    "buttons": [],
  });
}


/****************************** INSERT & UPDATE ***************************************/
function user_creation_cu(user_creation_id,action)
{
  	var forms = document.getElementsByClassName('was-validated');
	var validation = Array.prototype.filter.call(forms, function(form) {
		if (form.checkValidity() === false) {
			event.preventDefault();
			event.stopPropagation();
		}else{
			format=$("form").serialize()+"&user_creation_id="+user_creation_id+"&action="+action;
			// alert(format);
			jQuery.ajax({
				type: "POST",
				url: "user_creation/curd.php",
				data: format,
				success: function(msg){			
			  		if(msg==3){					
						alert("Already Exist");	
					} else if(msg==1) {
						alert('Successfully Created');
						window.location.href="index.php?file=user_creation/list";
					} else if(msg==2) {
						alert('Successfully Updated');
						window.location.href="index.php?file=user_creation/list";
					} else if(msg==11) {
						alert('User Login Deactived!');
						//location.reload();
						window.location.href="index.php";
					}		
				}
			});
		}
	});	
	// }
}
function del(user_creation_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  	jQuery.ajax({
			type: "POST",
			url: "user_creation/curd.php",
			data: "user_creation_id="+user_creation_id+"&action="+"Delete",
			success: function(msg){
				if(msg==1) { 
					alert('Successfully Deleted'); 
					location.reload();
				} else if(msg==11) {
					alert('User Login Deactived!');
					//location.reload();
					window.location.href="index.php";
				}
			}
		});
	}
}