var print_pdf = new print_pdf()
function print_pdf()
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
       
        get_view_id();
   
    }


    function get_view_id()
    {

        $(document).on('click','.print-button',function(e)
        {

        
            id=$(this).attr("incident_id");

             $("a#print-link").attr("href","include/manage_fpdf.php?id="+id);
        });

    }
   
  
}