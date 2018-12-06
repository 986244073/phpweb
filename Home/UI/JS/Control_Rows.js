//设置控件可见性。
function tdVisibility()    
{
    var tbody = document.getElementById("receiving")    //获取表控件。
    var rows = tbody.rows.length;    //获取行数。
    if (rows == 2)
    {
    	tbody.rows[1].cells[3].style.visibility = "visible";    //设置为“显示”。
    	tbody.rows[1].cells[4].style.visibility = "hidden";    //设置为“隐藏”。
    }
    else
    {
        //遍历偶数行。
        for (var r = 1; r < rows - 1; r += 2)
        {
        	tbody.rows[r].cells[3].style.visibility = "hidden";    //设置为“隐藏”。
        }
        	tbody.rows[1].cells[4].style.visibility = "visible";    //设置为“显示”。
    }
}

//增加行。
function plusRow()
{
    var tbody = document.getElementById("receiving");    //获取表控件。
    var rows1 = tbody.rows.length;    //获取行数。
    var allrows = tbody.getElementsByTagName('tr');    //获取行。
    var allcells = allrows[rows1 - 1].getElementsByTagName('td');    //获取最后一行中的列。
    var newrow1 = tbody.insertRow();    //新增行。
    newrow1.style.height = "20px";    //设置新增行的高度。
    newrow1.style.width = "800px";    //设置新增行的宽度。
    var newrow2 = tbody.insertRow();    //新增行。
    var newcell0 = newrow2.insertCell();    //在新增行中新增列。
    var newcell1 = newrow2.insertCell();    //在新增行中新增列。
    var newcell2 = newrow2.insertCell();    //在新增行中新增列。
    var newcell3 = newrow2.insertCell();    //在新增行中新增列。
    var newcell4 = newrow2.insertCell();    //在新增行中新增列。
    newcell0.align = "center";    //设置新增列的对齐方式。
    newcell1.align = "center";    //设置新增列的对齐方式。
    newcell2.align = "center";    //设置新增列的对齐方式。
    newcell3.align = "center";    //设置新增列的对齐方式。
    newcell4.align = "center";    //设置新增列的对齐方式。
    newcell0.innerHTML = allcells[0].innerHTML;    //在新增列加入相应的控件。
    newcell1.innerHTML = allcells[1].innerHTML;    //在新增列加入相应的控件。
    newcell2.innerHTML = allcells[2].innerHTML;    //在新增列加入相应的控件。
    newcell3.innerHTML = allcells[3].innerHTML;    //在新增列加入相应的控件。
    newcell4.innerHTML = allcells[4].innerHTML;    //在新增列加入相应的控件。
    var rows2 = tbody.rows.length;    //获取行数。
    document.getElementsByName("receiving_name[]")[rows2 / 2 - 1].value = "";    //设置元素值为空。
    document.getElementsByName("receiving_contact[]")[rows2 / 2 - 1].value = "";    //设置元素值为空。
    document.getElementsByName("receiving_address[]")[rows2 / 2 - 1].value = "";    //设置元素值为空。
    tdVisibility();    //调用“设置控件可见性”函数。
}

//减少行。
function reduceRow(row)    
{
    var index = row.rowIndex;    //获取当前行号。
    var tbody = document.getElementById("receiving")    //获取表控件。
    var rows = tbody.rows.length;    //获取行数。
    //判断行数。
    if ((rows / 2) > 1)
    {
    	tbody.deleteRow(index - 3);    //删除当前行。
    	tbody.deleteRow(index - 4);    //删除上一行。
    }
    tdVisibility();    //调用“设置控件可见性”函数。
}