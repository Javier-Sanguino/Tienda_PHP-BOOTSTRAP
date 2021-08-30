<!DOCTYPE HTML>
<html>

<head>
    <style>
        #div1 {
            width: 200px;
            height: 100px;
            padding: 10px;
            border: 1px solid #aaaaaa;
        }
        #div2 {
            width: 200px;
            height: 100px;
            padding: 10px;
            border: 1px solid #aaaaaa;
        }
    </style>
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
            //window.alert(data);
            // var jsVar1 = data;
            // var jsVar2 = "World";
            // window.location.href = "./datos.php" + "?w1=" + jsVar1 + "&w2=" + jsVar2;
            var nombre = document.getElementById('inputx').value = data;
        }
    </script>
</head>

<body>

    <p>Drag the W3Schools image into the rectangle:</p>

    <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <!-- <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div> -->
    <br>
    <img id="Harry_Potter" src="../img/funko_harry_potter.jpg" draggable="true" ondragstart="drag(event)" width="200" height="100">
    <img id="Spider-man" src="../img/funko_iron_spider.jpg" draggable="true" ondragstart="drag(event)" width="200" height="100">
    <form action="./datos.php" method="post">
        <input type="hidden" id="inputx" name="inputx">
        <!-- <input type="hidden" id="input2" name="input2"> -->
        <input type="submit" value="Enviar">
    </form>

</body>

</html>