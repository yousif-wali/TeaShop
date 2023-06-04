<style>
    .cube{
                width:100px;
                aspect-ratio:1/1;
                margin:5em;
                position:relative;
                animation:rotation 30s ease-in infinite alternate;
                transform-style:preserve-3d;
                transform: rotateX(10deg) rotateY(-20deg);
            }
            .cube img{
                width:100%;
                height:100%;
                position:absolute;
                border:1px solid black;
            }
            .cube img:nth-child(2){
                transform:translateX(50px) translateZ(-50px) rotateY(90deg);
            }
            .cube img:nth-child(3){
                transform:translateY(50px) translateZ(-50px) rotateX(90deg);
            }
            .cube img:nth-child(4){
                transform:translateY(-50px) translateZ(-50px) rotateX(90deg);
            }
            .cube img:nth-child(5){
                transform:translateX(-50px) translateZ(-50px) rotateY(90deg);
            }
            .cube img:nth-child(6){
                transform:translateX(0px) translateZ(-100px) rotateZ(90deg);
            }
            @keyframes rotation{
                from{
                    transform:rotateY(0deg) rotateX(0deg);
                }
                to{
                     transform:rotateY(-960deg) rotateX(1080deg);
                }
            }
            #cubeHolder{
                width:max-content;
                user-select:none;
                -webkit-user-select: none;
                -moz-user-select: none;
            }
</style>
<section id='cubeHolder'>
    <section class="cube">
            <!--
                <img draggable='false' src="https://th.bing.com/th/id/OIP.R01Cp4VOlr7N1W7uY39ePwHaDx?w=298&h=178&c=7&r=0&o=5&dpr=1.5&pid=1.7"/>
                <img draggable='false' src="https://th.bing.com/th/id/OIP.rwF08Y382LSRmlom8XITDwHaEK?w=321&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7"/>
                <img draggable='false'src="https://th.bing.com/th/id/OIP.92vweUWkCToYtzKpyJmNPgHaGI?w=200&h=182&c=7&r=0&o=5&dpr=1.5&pid=1.7"/>
                <img draggable='false' src="https://th.bing.com/th/id/OIP.wfI37osuwtQA5SEXmdpIAgHaEF?w=327&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7"/>
                <img draggable='false' src="https://th.bing.com/th/id/OIP.Ci8Dqcd7uv6NeXeDQSk3ZwHaEK?w=300&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7"/>
                <img draggable='false' src="https://th.bing.com/th/id/OIP.iBRA6W5vlsTcfOPFMWI60AHaE7?w=251&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7"/> 
            -->
            <img draggable="false" src="./src/images/1.jpg"/>
            <img draggable="false" src="./src/images/2.jpg"/>
            <img draggable="false" src="./src/images/4.jpg"/>
            <img draggable="false" src="./src/images/5.jpg"/>
            <img draggable="false" src="./src/images/6.jpg"/>
            <img draggable="false" src="./src/images/8.jpg"/>
    </section>
</section>