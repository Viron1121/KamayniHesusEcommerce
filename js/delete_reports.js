var delete_reports = new delete_reports()
function delete_reports()
{
    init()
     function init()
    {
        $(document).ready(function()
        {
            document_ready(); 
        
        });   
    }
    function document_ready()
    {
       
        get_delete_id();
   
    }


    function get_delete_id()
    {

        $(document).on('click','.delete-button',function(e)
        {

        
            id=$(this).attr("account_id");

             $("a#delete-link").attr("href","include/delete_incident.php?id="+id);
        });

    }
   
  
}