function myajax(sendtype,sendurl,successfn,errorfn)
{
	this.sendtype=sendtype;
	this.sendurl=sendurl;
	this.successfn=successfn;
	this.errorfn=errorfn;
	}
myajax.prototype={
	senddata:'',
	ajaxrun :function()
	{
		$.ajax({
			type:sendtype,
			data:senddata,
			url:sendurl,
			//contentType: "application/json",
			dataType:"json",
			success:successfn,
			error:errorfn
			});
	},
	setdata : function(dataarry){
			senddata=dataarry;
		}
}