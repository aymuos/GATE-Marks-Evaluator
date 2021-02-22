<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Estimate GATE 2016 Rank | See How Others Performed | Gateoverflow.in</title>
    <!-- http://www.webgeekly.com/tutorials/jquery/how-to-switch-css-files-on-the-fly-using-jquery/ -->
    <link id="dynamic-css" rel="stylesheet" type="text/css" href="visualizeMarks-dark.css">
    <!-- <link rel="stylesheet" type="text/css" href="subject_select/css/select.css"> -->
</head>
<body>
    <div align="center" id="top-float">
        <table width="80%">

            <tr>
                <td><table class="top-tables">
                    <tr>
                        <th>My Marks</th>
                        <td>
                            <input type="text" style="width: 55%" id="my-marks" value="<?php if(isset($_GET["marks"])){echo $_GET["marks"];} ?>" oninput="calculate();">
                        </td> <br/>
                    </tr>
                    <tr><td colspan="2"><a href="index.php" class="top-float">(Click here to view your marks)</a></td></tr>
                    <tr>
                        <th>My Set</th>
                        <td>
                            <span>
                                <input type="radio" name="my-set" class="radio" id="radio1" value="5" checked onclick="calculate();">
                                <label for="radio1">1</label>
                            </span><br />
                            <span>
                                <input type="radio" name="my-set" class="radio" id="radio2" value="6" onclick="calculate();">
                                <label for="radio2">2</label>
                            </span>
                        </td>
                    </tr>
                </table></td>
                <td><table class="top-tables">
                    <tr>
                        <th style="text-align: right;">Normalized marks</th>
                        <th id="normalized-marks"></th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">Qualifying Marks</th>
                        <th id="qualifying-marks"></th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">Score</th>
                        <th id="score"></th>
                    </tr>
                </table></td>
                <td><table class="top-tables">
                    <tr>
                        <th style="text-align: right;">Rank Estimate</th>
                        <th id="rank-estimate"></th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">Rank Normalized</th>
                        <th id="rank-normalized"></th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">Rank in Set</th>
                        <th id="rank-set"></th>
                    </tr>
                </table></td>
            </tr>
        </table>
        <p class="custom-select-label">Select subjects from the list: </p>
        <div class="subject-select">
            <div class="subject-chips-container">
                <!-- <div class="chip">
                    Computer Organisation
                    <svg
                                class="clear-icon icon"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                            <path
                                d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z"
                                fill="currentColor"
                            />
                    </svg>
                </div> -->
            </div>
            <div class="custom-select-wrapper">
                <div class="custom-select">
                    <span class="custom-select-trigger">
                        Choose Subject
                    </span> 
                    <div class="wide custom-options">
                    
                        <form class="search-container">
                            <input type="text" id="search-bar" placeholder="search subject"/>
                            <svg
                                class="search-icon icon"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z"
                                    fill="currentColor"
                                />
                            </svg>
                            <svg
                                class="clear-icon icon"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                style="display: none;"
                            >
                                <path
                                    d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z"
                                    fill="currentColor"
                                />
                            </svg>
                        </form>
                        <ul class="select-menu">



                            <!-- <li data-value="Physics">
                                <input type="checkbox"/>
                                <div>Physics</div>
                            </li>
                            <li data-value="Maths"><input type="checkbox"/><div>Maths</div></li>
                            <li data-value="iwhiw"><input type="checkbox"/><div>ljeorpibife</div></li>
                            <li data-value="tybfibi"><input type="checkbox"/><div>ooibboa</div></li>
                            <li data-value="iwnbgibc"><input type="checkbox"/><div>pnbcaahw</div></li>
                            <li data-value="lllpefincc"><input type="checkbox"/><div>wpjnnn</div></li>
                            <li data-value="poninas"><input type="checkbox"/><div>ojoff oihfpoj</div></li>
                            <li data-value="OUnit"><input type="checkbox"/>Operation Unit</li>
                            <li data-value="dogge"><input type="checkbox"/>ShibuDoggie</li>
                            <li data-value="cat"><input type="checkbox"/>Meowm</li>
                            <li data-value="pontiac"><input type="checkbox"/>GT2 Firebird TransAM</li>
                            <li data-value=cse"><input type="checkbox"/>Computer Science</li>
                            <li data-value="ceramics"><input type="checkbox"/>Ceramic Technology</li>
                            <li data-value="heattransfer"><input type="checkbox"/>HotAtoCOldB</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><hr />
    <div align="center">
        <a href="ScoreToColleges.php" id="colleges">Click to <b>View list of IITs and NITs. See which colleges you might get.</b></a>
    </div>
    <hr />
    <div id="settings-box-container">
        <div id="settings-box">
            <table>
            <tr>
                <td>
                    <h1 id="settings-box-heading">Settings</h1>
                    <h2>Theme</h2>
                    <span>
                        <input type="radio" name="theme" class="radio" id="theme-dark" checked onclick="set_theme()">
                        <label for="theme-dark">Dark</label>
                    </span><br/>
                    <span>
                        <input type="radio" name="theme" class="radio" id="theme-light" onclick="set_theme()">
                        <label for="theme-light">Light</label>
                    </span>
                    <h2>Interval Width</h2>
                    <span id="interval-width">5</span> <a onclick="change_interval(true)" href="#">+</a> <a onclick="change_interval(false)" href="#">-</a>
                    <h2>Counts</h2>
                    <span>
                        <input type="radio" name="counts" class="radio" id="counts-individual" onclick="set_cumulative()">
                        <label for="counts-individual">Individual</label>
                    </span><br/>
                    <span>
                        <input type="radio" name="counts" class="radio" id="counts-cumulative" onclick="set_cumulative()" checked>
                        <label for="counts-cumulative">Cumulative</label>
                    </span><br/>
                    <span>
                        <input type="radio" name="counts" class="radio" id="counts-revcumulative" onclick="set_cumulative()" checked>
                        <label for="counts-revcumulative">Rev. Cumulative</label>
                    </span>
                </td>
                <td><div id="collapse-button" onclick="toggle_settings_box()"></div></td>
            </tr>
            </table>
        </div>
    </div>
    <div id="charts" align="center">
        <div id="headings">
            <div class="tabular"><h1 class="underline">Set 1 <span  id="set5-total" class="total"></span></h1></div>
            <div class="tabular"><h1 class="underline">Set 2 <span  id="set6-total" class="total"></span></h1></div>
            <div class="tabular"><h1 class="underline">Overall <span id="all-total" class="total"></span></h1></div>
        </div>

        <!-- <h2 class="underline">Raw</h2> -->
        <div id="raw">
            <div class="tabular raw">
                <h2>Before Normalization</h2>
                <h3 id="set5-stats"></h3>
                <div id="set5-raw"></div>
            </div>
            <div class="tabular raw">
                <h2>Before Normalization</h2>
                <h3 id="set6-stats"></h3>
                <div id="set6-raw"></div>
            </div>
            <div class="tabular raw">
                <h2>Before Normalization</h2>
                <h3 id="all-stats"></h3>
                <div id="all-raw" ></div>
            </div>
        </div>

        <!-- <h2 class="underline">Normalized</h2> -->
        <div id="normalized">
            <div class="tabular normalized">
                <h2>After Normalization</h2>
                <div id="set5-normalized"></div>
            </div>
            <div class="tabular normalized">
                <h2>After Normalization</h2>
                <div id="set6-normalized"></div>
            </div>
            <div class="tabular normalized">
                <h2>After Normalization</h2>
                <div id="all-normalized" ></div>
            </div>
        </div>

        <div align="center" class="credits">
            <div class="tabular"><p>Code:<br/><a href="https://github.com/AgarwalPragy/GATE2016_MarksEvaluator">[Github]</a></p></div>
            <div class="tabular"><p>Author: Pragy Agarwal<br/><a href="https://www.facebook.com/profile.php?id=1644835049">[Facebook]</a> <a href="mailto:agar.pragy@gmail.com">[email]</a></p></div>
            <div class = "tabular"><p>Special Thanks to:<br/>Arjun Suresh, Shyam Singh</p></div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="VisualizeMarks.js"></script>
    <script src="raw_data.js"></script>
    <script src="subject_select/js/select.js"></script>
    <script>
        window.raw_data = window.raw_data.split(/\s+/);
        $("#radio<?php if(isset($_GET["set"])){echo $_GET["set"];}else{echo 1;}?>").prop("checked", true);
        do_initialize();
     </script>
</body>
</html>