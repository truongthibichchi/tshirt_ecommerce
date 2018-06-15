function covertUnicodeToChar(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    return str;
}
$.fn.PagingTable = function(columnFormat,listDataTable,eventAfter=null){
    //properties
    var PageLoadedEvent=eventAfter;
    var divElement =  this;
    var countRecordMaxView = 5;
    var countPageMaxView = 5;
    var startPage = 1;
    var dataPre = 'pre-data';
    var dataFirstPre = 'first-data';
    var disablePre = false;
    var dataNext = 'next-data';
    var dataLastNext = 'last-data';
    var disableNext = false;
    var pageNow = 1;
    var countRecord = 0;
    var countPage = 0;
    var listRowTable = [];
    var itemSort = { UNSORT: 'unsort', ASC: 'sort-asc', DESC: 'sort-desc' };
    //set thuộc tính format column
    var ColumnFormat = columnFormat;
    //Số trang bé nhất hiện tiếp theo
    var nextListPage = 1;
    //set properties
    //get value in #value# in string
    function GetName(str) {
        return str.match(/#\w+#/ig);
    }
    //set attribute for tag
    function SetAttribute(tag, attrs, rowIndex) {
        var keys = Object.keys(attrs);
        for (var k in keys) {
            if (keys.hasOwnProperty(k)) {
                //get name  if it exists
                var nameList = GetName(attrs[keys[k]]);
                if (nameList == undefined || nameList.length <= 0) {
                    if (keys[k] === "text") { //innerText
                        tag.innerHTML = attrs[keys[k]];
                    } else { //attribute
                        if (Object.hasOwnProperty.call(keys, k)) {
                            tag.setAttribute(keys[k], attrs[keys[k]]);
                        }
                    }
                } else { //replace name by value in data
                    var value = new Object(attrs[keys[k]]);
                    for (var i = 0; i < nameList.length; i++) {
                        value=value.replace(nameList[i],
                            listRowTable[rowIndex].data[nameList[i].replace(/#/g, "")])
                    }
                    if (keys[k] === "text") { //innerText
                        tag.innerHTML = value;
                        } else { //attribute
                            if (Object.hasOwnProperty.call(keys, k)) {
                                tag.setAttribute(keys[k],value);
                            }
                        }
                    }
                }
            }
        }
    //get all properties from list
    function GetProperties(listRow) {
        countRecord = 0;
        for (var i = 0; i < listRow.length; i++) {
            if (listRowTable[i].flag === 0) {
                countRecord++;
            }
        }
        countPage = countRecord % countRecordMaxView === 0 ? countRecord / countRecordMaxView : ~~(countRecord / countRecordMaxView) + 1;
    }
    //function get record of page in listRowTable
    function GetRecordInpage(pageNumber) {
        if (pageNumber <= 1) {
            disablePre = true;
            pageNumber = 1;
        } else {
            disablePre = false;
        }
        if (pageNumber >= countPage) {
            disableNext = true;
            pageNumber = countPage;        
        } else {
            disableNext = false;
        }
        pageNow = pageNumber;
        $(divElement).find(".Table-Pagin tbody").html("");
        var index = 0;
        var indexStart = pageNumber * countRecordMaxView - countRecordMaxView;
        //get index start of page in list
        while (indexStart > 0 && index < listRowTable.length) {
            if (listRowTable[index].flag == 0) {
                indexStart--;
            }
            index++;
        }
        // push to html
        var countRecordView = new Object(countRecordMaxView); //create new varible don't reference to old variable
        while (countRecordView > 0 && index < listRowTable.length) {
            if (listRowTable[index].flag == 0) {
                var tr = document.createElement('tr');
                //set attribute for tr
                SetAttribute(tr, ColumnFormat.tr, index);
                //set value and attribute for all td in tr
                var keys = Object.keys(ColumnFormat.td);
                for (var k = 0; k < keys.length; k++) {
                    var td = document.createElement('td');
                    //set attribute for a td
                    SetAttribute(td, ColumnFormat.td[k], index);
                    tr.appendChild(td);
                }
                //add to table
                $(divElement).find(".Table-Pagin tbody").append(tr);
                countRecordView--;
            }
            index++;
        }
        if (PageLoadedEvent != null){
            PageLoadedEvent();
        }
    }
    //get index start show of page
    function GetStartIndex() {
        if ((pageNow - startPage) >= countPageMaxView - nextListPage) {
            startPage = pageNow + nextListPage - countPageMaxView + 1;
            if (startPage + countPageMaxView > countPage) {
                startPage = countPage - countPageMaxView + 1;//chon đúng count Phần tử.
            }
            return startPage;
        }
        (pageNow - startPage) < nextListPage ? (pageNow <= 2 ? startPage = 1 : startPage = pageNow - nextListPage) : startPage = startPage;
        return startPage;
    }
    //create page pagination
    function InitPagination(startIndex) {
        //create ul
        var ul = document.createElement("ul"); ul.setAttribute("class", "pagination ul-Pagination"); ul.setAttribute("style", "margin: 0;");
        //create li firstPre
        var lifirstPre = document.createElement("li");
        lifirstPre.setAttribute("data-page", dataFirstPre);
        var lifirstPreA = document.createElement("a"); lifirstPreA.setAttribute("href", "#");
        var span = document.createElement("span"); span.setAttribute("class", "glyphicon glyphicon-backward"); span.setAttribute("aria-hidden", "true");
        lifirstPreA.appendChild(span);
        lifirstPre.appendChild(lifirstPreA);
        //create li with <a> preVious
        var liPre = document.createElement("li");
        liPre.setAttribute("data-page", dataPre);
        var liPreA = document.createElement("a"); liPreA.setAttribute("href", "#");
        var span = document.createElement("span"); span.setAttribute("class", "glyphicon glyphicon-chevron-left"); span.setAttribute("aria-hidden", "true");
        liPreA.appendChild(span);
        liPre.appendChild(liPreA);
        //add li to ul
        if (disablePre) {
            lifirstPre.setAttribute('class', 'disabled');
            liPre.setAttribute('class', 'disabled');
        }
        ul.appendChild(lifirstPre);
        ul.appendChild(liPre);
        //add items of pagePagination
        var li;
        var liA;
        for (var i = startIndex ; i <= countPage && i < startIndex + countPageMaxView; i++) {
            //create li with <a> preVious
            li = document.createElement("li"); li.setAttribute("data-page", i);
            if (i === pageNow) {
                li.setAttribute("class", "active");
            }
            liA = document.createElement("a"); liA.setAttribute("href", "#");
            $(liA).text(i);
            li.appendChild(liA);
            //add li to ul
            ul.appendChild(li);
        }
        //create li with <a> next
        var liNext = document.createElement("li");
        liNext.setAttribute("data-page", dataNext);
        var liNextA = document.createElement("a");
        liNextA.setAttribute("href", "#")
        var span = document.createElement("span"); span.setAttribute("class", "glyphicon glyphicon-chevron-right"); span.setAttribute("aria-hidden", "true");
        liNextA.appendChild(span);
        liNext.appendChild(liNextA);
        //create li lastNext
        var lilastNext = document.createElement("li");
        lilastNext.setAttribute("data-page", dataLastNext);
        var lilastNextA = document.createElement("a"); lilastNextA.setAttribute("href", "#");
        var span = document.createElement("span"); span.setAttribute("class", "glyphicon glyphicon-forward"); span.setAttribute("aria-hidden", "true");
        lilastNextA.appendChild(span);
        lilastNext.appendChild(lilastNextA);
        //add li to ul
        if (disableNext) {
            liNext.setAttribute('class', 'disabled');
            lilastNext.setAttribute('class', 'disabled');
        }
        ul.appendChild(liNext);
        ul.appendChild(lilastNext);
        //render html
        $(divElement).find(".Table-Pagination").html(ul);
    }
    //change page now when click 
    function ClickPagination() {
        var valueClick = $(this).data('page');
        switch (valueClick) {
            case dataFirstPre:
            GetRecordInpage(1);
            CreatePageNavition();
            break;
            case dataPre:
            GetRecordInpage(--pageNow);
            CreatePageNavition();
            break;
            case dataNext:
            GetRecordInpage(++pageNow);
            CreatePageNavition();
            break;
            case dataLastNext:
            GetRecordInpage(countPage);
            CreatePageNavition();
            break;
            default:
            GetRecordInpage(valueClick);
            CreatePageNavition();
            break;
        }
    }

    //funtion create pagination by list
    function CreatePageNavition() {
        var startIndex = GetStartIndex();
        InitPagination(startIndex);
        var pagination = $(divElement).find('.Table-Pagination').find('.ul-Pagination');
        pagination.on("click", "li", ClickPagination);
    }
    //change row in page when change
    function ChangeCountRowInPage(countRow) {
        countRecordMaxView = countRow;
        GetProperties(listRowTable);
        GetRecordInpage(1);
        CreatePageNavition();
    }
    //function sort asc of data
    function SortASC(fieldSort) {
        listRowTable.sort(function (a, b) {
            //check isNumber
            if (!isNaN(a.data[fieldSort]) && !isNaN(b.data[fieldSort])) {
                return a.data[fieldSort] - b.data[fieldSort];
            }
            return a.data[fieldSort].localeCompare(b.data[fieldSort]);
        });
        GetRecordInpage(1);
        CreatePageNavition();
    }
    //function sort asc of data
    function SortDESC(fieldSort) {
        listRowTable.sort(function (a, b) {
            //check isNumber
            if (!isNaN(a.data[fieldSort]) && !isNaN(b.data[fieldSort])) {
                return b.data[fieldSort] - a.data[fieldSort];
            }
            return b.data[fieldSort].localeCompare(a.data[fieldSort]);
        });
        GetRecordInpage(1);
        CreatePageNavition();
    }
    //function sort on th table
    function SortOnClickElemnt(){
        var fieldElement = $(this).parent().data('sort');
        var classNow = $(this).attr('class');
        $('.table-Sort i').attr('class', itemSort.UNSORT)
        switch (classNow) {
            case itemSort.UNSORT:
            $(this).attr('class',itemSort.ASC);
            SortASC(fieldElement);
            break;
            case itemSort.ASC:
            $(this).attr('class', itemSort.DESC);
            SortDESC(fieldElement);
            break;
            case itemSort.DESC:
            $(this).attr('class', itemSort.ASC);
            SortASC(fieldElement);
            break;
            default:
            break;
        }
    }
    //set sort on table
    function SortTable() {
        var iElement = $(divElement).find('.table-Sort').find('i').remove();
        $(divElement).find('.table-Sort').append("<i class='" + itemSort.UNSORT + "'></i>");
        $(divElement).find('.table-Sort i').on('click', SortOnClickElemnt);
    }

    //function change text on input -> change listSearch
    function  ChangesText(textChange) {
            //get element by string
            var isDisplay;
            var listContent;
            var strContent;
            var keys = Object.keys(listRowTable[0].data);
            for (var i = 0; i < listRowTable.length; i++) {
                isDisplay = false;
                for (var j = 0; j < keys.length; j++) {
                    if (listRowTable[i].data[keys[j]] == null) continue;
                    if(keys[j]=='Action') continue;
                    if (covertUnicodeToChar(listRowTable[i].data[keys[j]].toString()).toUpperCase().indexOf(covertUnicodeToChar(textChange).toUpperCase()) > -1) {
                        listRowTable[i].flag = 0;
                        isDisplay = true;
                        break;
                    }
                }
                if (!isDisplay) {
                    listRowTable[i].flag = 1;
                }
            }
            GetProperties(listRowTable);
            GetRecordInpage(1);
            CreatePageNavition();
        }

    //create page
    function CreatePageTable(listRecordTR) {
        listRowTable = listRecordTR;
        GetProperties(listRowTable);
        SortTable();
        $(divElement).find('.Pagin-btnSearch').on("click",function(){
            ChangesText($(divElement).find(".Pagin-inputSearch").val());
        });
        $(divElement).find(".Pagin-inputSearch").keyup(function(event)
        {
            var code = event.keyCode || event.which;
            if (code === 13)
            {
               $(divElement).find('.Pagin-btnSearch').click();
           }
       });
        var elementShowEntries = $(divElement).find('.Pagin-ShowEntries');
        if($(elementShowEntries).length){
            $(elementShowEntries).on('change',function(){
                ChangeCountRowInPage($(this).val());
            })
            ChangeCountRowInPage($(elementShowEntries).val());
        }else{
            ChangeCountRowInPage(countRecordMaxView);
        }
    }
    CreatePageTable(listDataTable); 
    //return function insert update delete
    var pagin = {

        //thêm 1 item
        AddRowTable:function (object) {
            listRowTable.push(object);
            GetProperties(listRowTable);
            GetRecordInpage(countPage);
            CreatePageNavition();
        },
        //xóa nhiều item với key và value
        DeleteItemInListRowTable:function (key, keyValue) {
            var isDelete = false;
            //xoa het các object có data[key] == value
            for (var i = 0; i < listRowTable.length; i++) {
                if (listRowTable[i].data[key] == keyValue) {
                    listRowTable.splice(i, 1);
                    isDelete = true;
                }
            }
            //chi reload khi có thực hiện thao tác xóa
            GetProperties(listRowTable);
            if (isDelete) {
                if (pageNow > countPage) {
                    pageNow = countPage;
                }
                GetRecordInpage(pageNow);
                CreatePageNavition();
            }
        },
        //lấy item
        getItem:function (key, keyValue) {
            for (var i = 0; i < listRowTable.length; i++) {
                if (listRowTable[i].data[key] == keyValue) {
                    return listRowTable[i];
                }
            }
            return null;
        },
        //update item with ky ang key value
        UpdateItemInListRowTable:function (key, keyValue, value) {
            var isUpdate = false;
            //xoa het các object có data[key] == value
            for (var i = 0; i < listRowTable.length; i++) {
                if (listRowTable[i].data[key] == keyValue) {
                    listRowTable[i] = value;
                    isUpdate = true;
                }
            }
            //chi reload khi có thực hiện thao tác xóa
            if (isUpdate) {
                GetRecordInpage(pageNow);
            }
        },
        getCountItem: function(){
            return listRowTable.length;
        }
    }
    return pagin;
}
