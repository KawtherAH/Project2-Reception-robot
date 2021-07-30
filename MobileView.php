<!--KawtherAqeel-->

<?php
include 'connect-db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Control Panel</title>
    <link rel="stylesheet" href="CSS/ss.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <style>
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            html {
                scroll-behavior: smooth;
            }

            h1 {
                font-size: 25px;
                padding: 5px;
            }

            div.arm {
                margin-left: 5%;
                height:max-content;
            }

            form.arm {
                min-width: 80%;
                padding: 15px 5px 10px 5px;
                position: relative;

            }

            table {
                padding: 5px 21% 5px;
            }

            legend {
                font-size: 100%;
                padding-top: 2%;
                border-bottom: 1px solid #B0C4DE;
                padding: 2px 0px;
                width: 100%;
            }

            fieldset {
                border: none;
            }

            label {
                font-size: 20px;
            }

            input[type="range"] {
                width: 100%;
            }

            div.base {
                margin-left: 5%;
                height:max-content;

                min-width: 80%;
                padding: 1%;
                position:sticky;
            }

            button.map {
                font-size: 80%;
                width: 100px;
                margin: 20px 10px 20px;
            }
        }

        /* Small devices (portrait tablets and large phones,between 601px and 767px) */
        @media only screen and (min-width: 601px) and (max-width: 768px) {
            form.arm {
                background: lightgreen;
            }
        }

        /* Medium devices (landscape tablets,between 768 and 992px) */
        @media only screen and (min-width: 768px) and (max-width: 992px) {
            form.arm {
                background: lightsalmon;
            }
        }

        /* Large devices (laptops/desktops, 992px and up)
@media only screen and (min-width: 992px) {
    form.arm{
        background: lightskyblue;
    }
}*/
        /* Extra large devices (large laptops and desktops, 1200px and up) 
@media only screen and (min-width: 1200px) {
    form.arm{
        background: brown;
    }
}*/
    </style>
</head>

<body>
    <h1>Fighter Robot Project</h1>
    <!--Arm Control-->
    <div class="warpper">
        <div class="arm">
            <form class="arm" id="f1" name="robotArm" action="index.php" method="POST">
                <fieldset>
                    <legend>Arm Control Panel</legend>
                    <table>

                        <tr>
                            <!--motor1-->
                            <td><label for="M1">Motor 1:</label>
                                <input type="text" id="text1" value="90">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="range" min="0" max="180" value="90" class="motor" id="M1" name="M1" oninput="updateTextValue();"></td>
                        </tr>

                        <tr>
                            <!--motor2-->
                            <td><label for="M2">Motor 2:</label>
                                <input type="text" id="text2" value="90">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="range" min="0" max="180" value="90" class="motor" id="M2" name="M2" oninput="updateTextValue();"></td>
                        </tr>

                        <tr>
                            <!--motor3-->
                            <td><label for="M3">Motor 3:</label>
                                <input type="text" id="text3" value="90">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="range" min="0" max="180" value="90" class="motor" id="M3" name="M3" oninput="updateTextValue();"></td>
                        </tr>

                        <tr>
                            <!--motor4-->
                            <td><label for="M4">Motor 4:</label>
                                <input type="text" id="text4" value="90">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="range" min="0" max="180" value="90" class="motor" id="M4" name="M4" oninput="updateTextValue();"></td>
                        </tr>

                        <tr>
                            <!--motor5-->
                            <td><label for="M5">Motor 5:</label>
                                <input type="text" id="text5" value="90">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="range" min="0" max="180" value="90" class="motor" id="M5" name="M5" oninput="updateTextValue();"></td>
                        </tr>

                        <tr>
                            <!--motor6-->
                            <td><label for="M6">Motor 6:</label>
                                <input type="text" id="text6" value="90">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="range" min="0" max="180" value="90" class="motor" id="M6" name="M6" oninput="updateTextValue();"></td>
                        </tr>
                    </table>
                </fieldset>
                <button class="btn" name="Save" value="Save" onclick="saveBtn();">Save</button><br>
                <button class="state" name="On" value="1" onclick="onBtn();">On</button>
                <button class="state" name="Off" value="0" onclick="offBtn();">Off</button><br>
                <button class="btn" name="Center" value="Center" onclick="centerArm();">Center</button>
            </form>
        </div><!--<div style="height: 50%; width: 50%; position:fixed;"></div>-->
        <!--Base Control-->
        <div class="base">
            <form id="f2" class="base" name="robotBase" action="index.php" method="POST">
                <fieldset>
                    <legend>Base Control Panel</legend>
                    <button class="map" name="Forward" value="F">Forward</button><br>
                    <button class="map" name="Left" value="L">Left</button>
                    <button class="map" name="Stop" value="S">Stop</button>
                    <button class="map" name="Right" value="R">Right</button><br>
                    <button class="map" name="Backward" value="B">Backward</button>
                </fieldset>
            </form>
        </div>

    </div>

    <script>
        function updateTextValue() {
            var M1 = document.getElementById('M1').value;
            document.getElementById('text1').value = M1;
            var M2 = document.getElementById('M2').value;
            document.getElementById('text2').value = M2;

            var M3 = document.getElementById('M3').value;
            document.getElementById('text3').value = M3;
            var M4 = document.getElementById('M4').value;
            document.getElementById('text4').value = M4;

            var M5 = document.getElementById('M5').value;
            document.getElementById('text5').value = M5;
            var M6 = document.getElementById('M6').value;
            document.getElementById('text6').value = M6;
        }

        function saveBtn() {
            alert("Motor Value Updated successfully");
        }

        function centerArm() {
            alert("All Motors Updated in DB to 90");
            document.getElementsByClassName("motor").setAttribute(value = "90");
        }

        function onBtn() {
            alert("Arm is on");
        }

        function offBtn() {
            alert("Arm is off");
        }

        /* Chatbot 
        window.watsonAssistantChatOptions = {
            integrationID: "ea10e795-8b02-442d-bd8a-c01832b366ae", // The ID of this integration.
            region: "eu-de", // The region your integration is hosted in.
            serviceInstanceID: "e06a0095-2985-49df-8a9b-55ed1ea4a8de", // The ID of your service instance.
            onLoad: function(instance) {
                instance.render();
            }
        };
        setTimeout(function() {
            const t = document.createElement('script');
            t.src = "https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
            document.head.appendChild(t);
        });*/
    
     /*
  window.watsonAssistantChatOptions = {
      integrationID: "c7e5f15d-50d4-4d08-9e3e-099a395f1ad0", // The ID of this integration.
      region: "eu-de", // The region your integration is hosted in.
      serviceInstanceID: "e06a0095-2985-49df-8a9b-55ed1ea4a8de", // The ID of your service instance.
      onLoad: function(instance) { instance.render(); }
    };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
    document.head.appendChild(t);
  });*/
  window.watsonAssistantChatOptions = {
      integrationID: "6e820cf4-7fde-4ad3-b565-22f63d1a9803", // The ID of this integration.
      region: "eu-de", // The region your integration is hosted in.
      serviceInstanceID: "e06a0095-2985-49df-8a9b-55ed1ea4a8de", // The ID of your service instance.
      onLoad: function(instance) { instance.render(); }
    };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
    document.head.appendChild(t);
  });

</script>
</body>

</html>
