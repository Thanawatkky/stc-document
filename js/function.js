
function delDoc(id) {
    if(confirm('ต้องการลบเอกสารนี้หรือไม่')) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET','api/ac_document.php?ac=del&doc_id='+id,true);
        xhr.setRequestHeader('Accept','application/json');
        xhr.onload = () => {
            if(xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                alert(data.msg);
                window.location.reload();
            }else{
                console.log(xhr.status);
            }
        }
        xhr.onerror =  () => {
            console.log(xhr.status);
        }
        const doc_id = JSON.stringify({ doc_id: id});
        xhr.send(doc_id);
    }
   
}
function readDoc(id) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET","../api/ac_document.php?ac=read&doc_id="+id,true);
    xhr.setRequestHeader("Accept",'application/json');
    xhr.onload = () => {
        if(xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            if(data.status) {
                window.location.reload();
            }else{
                console.log(data);
            }
        }else{
            console.log(xhr.status);
        }
    }
    xhr.onerror = () => {
        console.log(xhr.status);
    }
    const doc_id = JSON.stringify({doc_id: id});
    xhr.send(doc_id);
}