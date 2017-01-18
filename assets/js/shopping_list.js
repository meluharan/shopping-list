var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
    var xmlHttp;

    if(window.ActiveXObject){
        try{
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlHttp = false;
        }
    }else{
        try{
            xmlHttp = new XMLHttpRequest();
        }catch(e){
            xmlHttp = fales;
        }
    }

    if(!xmlHttp)
        alert("can not create xmlHttp request object!");
    else
        return xmlHttp;
}

function displayList(listName){
    xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200 )
                {
                    handleServerResponse(listName);
                }
        }
    xmlHttp.open("GET", "database/list_flat_database.xml" , true);
    xmlHttp.send(null);
}

function handleServerResponse(listName){
    var xmlResponse, xmlDocumentElement, innerList, i, j, name, text = "", select1, select2, option1, option2;
    var pName, productsNode, productsList, pText = "" ;
    arrTexts = new Array();
    xmlResponse = xmlHttp.responseXML;
    innerList = xmlResponse.getElementsByTagName('list');


    // check if listname string, if empty print list names else print item names
    if(listName !== ""){
      // update header dynamically
      document.getElementById('header_title').innerHTML = "List of items in " + listName;
    }
    for(i = 0;  i < innerList.length;  i++ ){
      // get the first child node of the user node
      name = innerList[i].getElementsByTagName('name').item(0);
      text = name.childNodes[0].nodeValue;
      if(listName === ""){
        document.getElementById('lists').innerHTML += ( '<tr>'+
                                                                '<td width="80%">'+text+'</td>'+
                                                                '<td width="10%">'+'<button name="selectedList" type="submit" style="width:100%;" Value ="'+text+'">Select</button>'+'</td>'+
                                                                '<td width="10%">'+'<button name="removeList" type="submit" style="width:100%;" Value ="'+text+'">Delete</button>'+'</td>'+
                                                         '</tr>');
      }else{
        if(text === listName){
          // get the list products node
          productsNode = innerList[i].getElementsByTagName('products').item(0);
          // get the list of existing products
          productsList = productsNode.getElementsByTagName('product');

          // loop through all products
          for(j = 0;  j < productsList.length;  j++){
            pName = productsList[j].getElementsByTagName('productName').item(0);
            pText = pName.childNodes[0].nodeValue;
            pIdName = productsList[j].getElementsByTagName('productId').item(0);
            pIdText = pIdName.childNodes[0].nodeValue;
            document.getElementById('products').innerHTML += ( '<tr>'+
                                                                     '<td width="15%">'+pIdText+'</td>'+
                                                                     '<td width="75%">'+pText+'</td>'+
                                                                     '<td width="10%">'+'<button name="removeItem" type="submit" style="width:100%;" Value ="'+pText+'">Delete</button>'+'</td>'+
                                                                     '</tr>');
          }
        }
      }
    }
}
