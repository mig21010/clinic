$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
	usernamea = $("#usernamea").val();
	passworda = $("#passworda").val();

	$.post("../ajax/usuario.php?op=verificar",
		{"usernamea":usernamea,"passworda":passworda},
		function(data)
	{
		if (data!="null") 
		{
			$(location).attr("href","usuario.php");
		}
		else
		{
			swal(
   					'Oops...',
  					'Something went wrong!',
  					'error'
			)
		}

	});
})