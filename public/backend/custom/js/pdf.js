


margins = {
    top: 70,
    bottom: 40,
    left: 30,
    width: 550
};




$('#pdfButton').on('click', function(){
    var pdf = new jsPDF('a4');
    pdf.setFontSize(18);
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };
    var content = document.getElementById('pdfContent');

    console.log(document.getElementById('pdfContent'));
    pdf.fromHTML(content,margins.left,margins.top,{
        'width':margins.width,
        'elementHandlers': specialElementHandlers
    },function(dispose) {
        headerFooterFormatting(pdf, pdf.internal.getNumberOfPages())
        pdf.save('web.pdf');
    },margins);

});
function headerFooterFormatting(doc, totalPages)
{
    for(var i = totalPages; i >= 1; i--)
    {
        doc.setPage(i);
        footer(doc, i, totalPages);
        doc.page++;
    }
};

function footer(doc, pageNumber, totalPages){
    var str = "Page " + pageNumber + " of " + totalPages;
    doc.setFontSize(10);
    doc.text(str, margins.left, doc.internal.pageSize.height - 20);

};
