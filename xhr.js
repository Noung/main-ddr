let posid = 4;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        // try {
        //     JSON.parse(this.responseText);
        // }
        // catch (error) {
        //     console.log('Error parsing JSON:', error, this.responseText);
        // }
        //document.getElementById("txtName").innerHTML = this.responseText;
        const obj = JSON.parse(this.responseText); //รับค่าแบบ json obj กลับมา
        console.log(this.responseText);
        document.getElementById("txtdust").innerHTML = obj.dust;
        document.getElementById("txttemp").innerHTML = obj.temp;
        document.getElementById("txtmois").innerHTML = obj.mois;
        document.getElementById("txtcarbon").innerHTML = obj.carbon;
        document.getElementById("txtaqi").innerHTML = obj.aqi;
    } else {
        //ไม่สามารถ fetch ข้อมูลมาแสดงได้
    }
}
xmlhttp.open("GET", "https://ddr.oas.psu.ac.th/ddrjson.php?posid=" + posid, true); //เพจที่ส่งค่า devId แบบ GET ไปประมวลผล
xmlhttp.send();

// fetch('https://jsonplaceholder.typicode.com/todos/1')
//     .then(response => response.json())
//     .then(json => console.log(json))