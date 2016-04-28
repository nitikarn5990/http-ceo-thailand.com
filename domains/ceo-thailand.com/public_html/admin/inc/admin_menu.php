 <ul>
                                <li class="<?=
                                PAGE_CONTROLLERS == 'slides' || $_GET['type'] == 'index' || PAGE_CONTROLLERS == 'home' || PAGE_CONTROLLERS == 'member' || PAGE_CONTROLLERS == 'home_banner' || PAGE_CONTROLLERS == 'text_slide' ? 'active' : ''
                                ?>"><a href="#"> <!-- Icon Container --> <span
                                            class="da-nav-icon"> <img src="../images/icon-home.png"
                                                                  width="32" height="32">
                                        </span> หน้าแรก
                                    </a>
                                    <ul>
                                        <li class="<?= PAGE_CONTROLLERS == 'slides' ? 'active' : '' ?>"><a href="<?php echo ADDRESS_ADMIN_CONTROL ?>slides">ภาพสไลด์</a></li>
                                        <li class="<?= PAGE_CONTROLLERS == 'text_slide' ? 'active' : '' ?>"><a href="<?php echo ADDRESS_ADMIN_CONTROL ?>text_slide&action=edit&id=1">อักษรวิ่ง</a></li>
                                        <li class="<?= PAGE_CONTROLLERS == 'home' ? 'active' : '' ?>"><a  href="<?php echo ADDRESS_ADMIN_CONTROL ?>home&action=edit&id=1">รายละเอียด</a></li>
                                        <li class="<?= PAGE_CONTROLLERS == 'home_banner' ? 'active' : '' ?>"><a  href="<?php echo ADDRESS_ADMIN_CONTROL ?>home_banner">แบนเนอร์</a></li>
                                          <li class="<?= PAGE_CONTROLLERS == 'member' ? 'active' : '' ?>"><a href="<?php echo ADDRESS_ADMIN_CONTROL ?>member">ข้อมูลสมาชิก</a></li>
                                    </ul>
                                </li>
                                <li class="<?= PAGE_CONTROLLERS == 'plan_make_money' ? 'active' : '' ?>"><a href="#"> <!-- Icon Container --> 
                                        <span
                                            class="da-nav-icon">
                                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDQ3IDQ3IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NyA0NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnIGlkPSJMYXllcl8xXzE1N18iPgoJCTxwYXRoIGQ9Ik00NywxNC45NTVWMi4xMzZDNDcsMC45NTYsNDYuMDQzLDAsNDQuODYzLDBIMzIuMDQ2Yy0xLjE4MSwwLTIuMTM3LDAuOTU3LTIuMTM3LDIuMTM2djUuMzQxICAgIGMtMTAuNDM2LDAtMTkuMjA0LDcuMTczLTIxLjY5OCwxNi44NDFMNS45OSwyMy45MjdjLTAuMzk5LTAuMDY5LTAuODAzLDAuMDkxLTEuMDQ0LDAuNDE2Yy0wLjI0LDAuMzI1LTAuMjc4LDAuNzU5LTAuMDk1LDEuMTIgICAgbDIuMzE0LDQuNTY5QzMuMTA5LDMwLjY5MywwLDM0LjIxMywwLDM4LjQ1NUMwLDQzLjE2NywzLjgzNCw0Nyw4LjU0Niw0N2M0LjM1LDAsNy45NDItMy4yNyw4LjQ3MS03LjQ3N2g3LjU1MXYyLjEzNiAgICBjMCwwLjQwNSwwLjIyOSwwLjc3NCwwLjU5MSwwLjk1NmMwLjM2MiwwLjE4LDAuNzk1LDAuMTQyLDEuMTItMC4xMDJsMy43MzQtMi44MDJjMC42MSw0LjExNiw0LjE1OCw3LjI4OCw4LjQ0LDcuMjg4ICAgIEM0My4xNjYsNDcsNDcsNDMuMTY3LDQ3LDM4LjQ1NWMwLTQuMzUtMy4yNy03Ljk0My03LjQ3OS04LjQ3MXYtNy41NTJoMi4xMzhjMC40MDMsMCwwLjc3NC0wLjIyOSwwLjk1NC0wLjU5ICAgIGMwLjE4Mi0wLjM2MSwwLjE0NC0wLjc5NS0wLjEtMS4xMTlsLTIuNzI1LTMuNjMxaDUuMDcyQzQ2LjA0MywxNy4wOTEsNDcsMTYuMTM0LDQ3LDE0Ljk1NXogTTguNTQ2LDQyLjcyNyAgICBjLTIuMzU2LDAtNC4yNzMtMS45MTYtNC4yNzMtNC4yNzFzMS45MTctNC4yNzMsNC4yNzMtNC4yNzNzNC4yNzIsMS45MTgsNC4yNzIsNC4yNzNTMTAuOTAyLDQyLjcyNyw4LjU0Niw0Mi43Mjd6IE00Mi43MjksMzguNDU1ICAgIGMwLDIuMzU1LTEuOTE4LDQuMjcxLTQuMjczLDQuMjcxcy00LjI3MS0xLjkxNi00LjI3MS00LjI3MXMxLjkxNi00LjI3Myw0LjI3MS00LjI3M1M0Mi43MjksMzYuMSw0Mi43MjksMzguNDU1eiBNMzQuMjk1LDIxLjg0MSAgICBjMC4xODIsMC4zNjIsMC41NTEsMC41OSwwLjk1NSwwLjU5aDIuMTM3djcuNTUxYy0zLjc5NCwwLjQ3OC02LjgxNCwzLjQ0Ny03LjM3Myw3LjIxNWwtMy43MzYtMi44MDMgICAgYy0wLjMyMy0wLjI0Mi0wLjc1Ni0wLjI4LTEuMTE4LTAuMTAxYy0wLjM2MSwwLjE4My0wLjU5MSwwLjU1MS0wLjU5MSwwLjk1NnYyLjEzNmgtNy41NTFjLTAuNDg0LTMuODYyLTMuNTUzLTYuOTI3LTcuNDE4LTcuNDA1ICAgIGMwLjAwMy0wLjAyNCwwLjAxNS0wLjA0NSwwLjAxNS0wLjA3MWMwLTAuMDA1LDAtMC4wMDcsMC0wLjAxMWwzLjIzMy0zLjAyN2MwLjI5NS0wLjI3NiwwLjQwOC0wLjY5NiwwLjI5NC0xLjA4NCAgICBjLTAuMTE3LTAuMzg5LTAuNDQtMC42NzgtMC44MzktMC43NDhsLTEuOTgzLTAuMzVDMTIuNjMyLDE2LjAyNCwyMC41MjYsOS42MTMsMjkuOTEsOS42MTN2NS4zNDFjMCwxLjE4LDAuOTU2LDIuMTM2LDIuMTM3LDIuMTM2ICAgIGg1LjA3M2wtMi43MjQsMy42MzJDMzQuMTUyLDIxLjA0NiwzNC4xMTMsMjEuNDc5LDM0LjI5NSwyMS44NDF6IE00Mi43MjksMTIuODE4aC04LjU0N1Y0LjI3M2g4LjU0N1YxMi44MTh6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
                                        </span>   แผนการสร้างรายได้
                                    </a>
                                    <ul>
                                        <li class="<?= PAGE_CONTROLLERS == 'plan_make_money' ? 'active' : '' ?>"><a  href="<?php echo ADDRESS_ADMIN_CONTROL ?>plan_make_money&action=edit&id=1">รายละเอียด</a></li>


                                    </ul>
                                </li>

                                <li class="<?= PAGE_CONTROLLERS == 'work_system' ? 'active' : '' ?>"><a href="#"> <!-- Icon Container --> 
                                        <span
                                            class="da-nav-icon"> 
                                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDI5NyAyOTciIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI5NyAyOTciIHdpZHRoPSIzMnB4IiBoZWlnaHQ9IjMycHgiPgogIDxnPgogICAgPHBhdGggZD0ibTExMi42MzIsMTg1LjA3NGw2Ljg4LTMuOTcyYzIuODA0LTEuNjE5IDMuNzY1LTUuMjA1IDIuMTQ2LTguMDFsLTEzLjAzNi0yMi41NzljLTEuMDg2LTEuODgxLTMuMDU3LTIuOTMzLTUuMDgzLTIuOTMzLTAuOTk1LDAtMi4wMDMsMC4yNTMtMi45MjYsMC43ODdsLTYuODgsMy45NzJjLTAuOTQ1LDAuNTQ1LTEuOTQ3LDAuNzk0LTIuOTIzLDAuNzk0LTMuMDYzLDAtNS44NzItMi40NDktNS44NzItNS44NzJ2LTcuOTQ0YzAtMy4yMzgtMi42MjUtNS44NjQtNS44NjQtNS44NjRoLTI2LjA3M2MtMy4yMzgsMC01Ljg2NCwyLjYyNS01Ljg2NCw1Ljg2NHY3Ljk0NGMwLDMuNDIzLTIuODEsNS44NzItNS44NzIsNS44NzItMC45NzYsMC0xLjk3OC0wLjI0OS0yLjkyMy0wLjc5NGwtNi44OC0zLjk3MmMtMC45MjMtMC41MzMtMS45MzItMC43ODYtMi45MjYtMC43ODctMi4wMjcsMC0zLjk5NywxLjA1Mi01LjA4MywyLjkzM2wtMTMuMDM2LDIyLjU3OWMtMS42MTksMi44MDUtMC42NTgsNi4zOTEgMi4xNDYsOC4wMWw2Ljg4LDMuOTcyYzMuOTA5LDIuMjU3IDMuOTA5LDcuODk5IDAsMTAuMTU2bC02Ljg4LDMuOTcyYy0yLjgwNSwxLjYxOS0zLjc2NSw1LjIwNS0yLjE0Niw4LjAxbDEzLjAzNiwyMi41NzljMS4wODYsMS44ODEgMy4wNTcsMi45MzMgNS4wODMsMi45MzMgMC45OTUsMCAyLjAwMy0wLjI1NCAyLjkyNi0wLjc4N2w2Ljg4LTMuOTcyYzAuOTQ1LTAuNTQ1IDEuOTQ3LTAuNzk0IDIuOTIzLTAuNzk0IDMuMDYzLDAgNS44NzIsMi40NDkgNS44NzIsNS44NzJ2Ny45NDRjMCwzLjIzOCAyLjYyNSw1Ljg2NCA1Ljg2NCw1Ljg2NGgyNi4wNzJjMy4yMzgsMCA1Ljg2NC0yLjYyNSA1Ljg2NC01Ljg2NHYtNy45NDRjMC0zLjQyMyAyLjgxLTUuODcyIDUuODcyLTUuODcyIDAuOTc2LDAgMS45NzgsMC4yNDkgMi45MjMsMC43OTRsNi44OCwzLjk3MmMwLjkyMywwLjUzMyAxLjkzMiwwLjc4NyAyLjkyNiwwLjc4NyAyLjAyNywwIDMuOTk3LTEuMDUyIDUuMDgzLTIuOTMzbDEzLjAzNi0yMi41NzljMS42MTktMi44MDUgMC42NTgtNi4zOTEtMi4xNDYtOC4wMWwtNi44OC0zLjk3MmMtMy45MDgtMi4yNTctMy45MDgtNy45IDAuMDAxLTEwLjE1NnptLTQ2LjU5NCwyMi40NzRjLTkuNjA4LDAtMTcuMzk2LTcuNzg5LTE3LjM5Ni0xNy4zOTYgMC05LjYwOCA3Ljc4OS0xNy4zOTYgMTcuMzk2LTE3LjM5NnMxNy4zOTYsNy43ODkgMTcuMzk2LDE3LjM5NmMwLDkuNjA3LTcuNzg5LDE3LjM5Ni0xNy4zOTYsMTcuMzk2eiIgZmlsbD0iIzAwMDAwMCIvPgogICAgPHBhdGggZD0ibTEwOC4xMDksMjMuNjU5Yy0zLjE0Ni0zLjE0NC04LjI0My0zLjE0NC0xMS4zODksMC0zLjE0NSwzLjE0Ni0zLjE0NSw4LjI0NCAwLDExLjM4OWwxNC4zOSwxNC4zODljLTUyLjg4OSwyLjYxOS05NS43MDEsNDQuMTYyLTEwMC4zMzQsOTYuNTA2bDEuMTktMi4wNjJjMy40MDYtNS45IDkuNzU2LTkuNTY1IDE2LjU3LTkuNTY0IDAuMTQ0LDAgMC4yODcsMC4wMTMgMC40MzEsMC4wMTcgOS4wNzQtMzcuNzIxIDQxLjk2NS02Ni4yNTEgODEuODE1LTY4LjcyOWwtMTQuMDYyLDE0LjA2MWMtMy4xNDUsMy4xNDUtMy4xNDUsOC4yNDQgMCwxMS4zODkgMS41NzMsMS41NzIgMy42MzMsMi4zNTggNS42OTQsMi4zNThzNC4xMjItMC43ODYgNS42OTQtMi4zNThsMjguMDA0LTI4LjAwNGMxLjUxLTEuNTExIDIuMzU4LTMuNTU5IDIuMzU4LTUuNjk0IDAtMi4xMzYtMC44NDgtNC4xODQtMi4zNTgtNS42OTRsLTI4LjAwMy0yOC4wMDR6IiBmaWxsPSIjMDAwMDAwIi8+CiAgICA8cGF0aCBkPSJtMjA5Ljg2OCw2NC44NTdjMTcuODgxLDAgMzIuNDI4LTE0LjU0NyAzMi40MjgtMzIuNDI4IDAtMTcuODgyLTE0LjU0Ny0zMi40MjktMzIuNDI4LTMyLjQyOS0xNy44ODEsMC0zMi40MjgsMTQuNTQ3LTMyLjQyOCwzMi40MjggMCwxNy44ODEgMTQuNTQ3LDMyLjQyOSAzMi40MjgsMzIuNDI5eiIgZmlsbD0iIzAwMDAwMCIvPgogICAgPHBhdGggZD0ibTI3My4wMzksMTUyLjI3NnYtNDQuNThjMC0xMi4zNC03LjkzLTIzLjI4My0xOS42NTctMjcuMTI0bC0uMDU0LS4wMTgtMTcuMTUyLTIuODRjLTEuNDYtMC40NDktMy4wMiwwLjMyNC0zLjU0NSwxLjc2NGwtMTkuNDYyLDUzLjM5OWMtMS4xMjMsMy4wODEtNS40OCwzLjA4MS02LjYwMiwwbC0xOS40NjItNTMuMzk5Yy0wLjQyNC0xLjE2My0xLjUyMi0xLjg5Mi0yLjY5OC0xLjg5Mi0wLjI3OSwwLTE3Ljk5OSwyLjk2NC0xNy45OTksMi45NjQtMTEuODIzLDMuOTQtMTkuNzIzLDE0LjktMTkuNzIzLDI3LjI5NHY0NC40MzJjMCw2LjY1OSA1LjM5OCwxMi4wNTYgMTIuMDU2LDEyLjA1NmgxMDIuMjQxYzYuNjYtMi44NDIxN2UtMTQgMTIuMDU3LTUuMzk4IDEyLjA1Ny0xMi4wNTZ6IiBmaWxsPSIjMDAwMDAwIi8+CiAgICA8cGF0aCBkPSJtMjg3LjM3LDE2Mi45MzNjLTAuNjczLDkuMjE1LTguMjMzLDE0Ljg1OC0xNy40NSwxNS41MjYtNy4wNjIsNDAuNDI1LTQxLjIwNyw3MS42NC04Mi45NzksNzQuMjM3bDE0LjA2MS0xNC4wNjFjMy4xNDUtMy4xNDYgMy4xNDUtOC4yNDQgMC0xMS4zODktMy4xNDYtMy4xNDQtOC4yNDMtMy4xNDQtMTEuMzg5LDBsLTI4LjAwMywyOC4wMDRjLTMuMTQ1LDMuMTQ2LTMuMTQ1LDguMjQ0IDAsMTEuMzg5bDI4LjAwMywyOC4wMDNjMS41NzMsMS41NzIgMy42MzMsMi4zNTggNS42OTQsMi4zNThzNC4xMjItMC43ODYgNS42OTQtMi4zNThjMy4xNDUtMy4xNDUgMy4xNDUtOC4yNDQgMC0xMS4zODlsLTE0LjM4OS0xNC4zODljNTYuMDI4LTIuNzc0IDEwMC43NTgtNDkuMjI3IDEwMC43NTgtMTA1LjkzMXoiIGZpbGw9IiMwMDAwMDAiLz4KICAgIDxwYXRoIGQ9Im0yMTYuOTM2LDc3LjEwNWMtMC43NDctMC44MTQtMS44NC0xLjIyNC0yLjk0Ni0xLjIyNGgtOC4yNDVjLTEuMTA1LDAtMi4xOTgsMC40MS0yLjk0NiwxLjIyNC0xLjE1NywxLjI2MS0xLjMyNSwzLjA4Mi0wLjUwNCw0LjUwNWw0LjQwNyw2LjY0NC0yLjA2MywxNy40MDUgNC4wNjMsMTAuODA4YzAuMzk2LDEuMDg3IDEuOTMzLDEuMDg3IDIuMzMsMGw0LjA2My0xMC44MDgtMi4wNjMtMTcuNDA1IDQuNDA3LTYuNjQ0YzAuODIyLTEuNDIzIDAuNjU0LTMuMjQ0LTAuNTAzLTQuNTA1eiIgZmlsbD0iIzAwMDAwMCIvPgogIDwvZz4KPC9zdmc+Cg==" />
                                        </span>   ระบบงาน
                                    </a>
                                    <ul>
                                        <li class="<?= PAGE_CONTROLLERS == 'work_system' ? 'active' : '' ?>"><a  href="<?php echo ADDRESS_ADMIN_CONTROL ?>work_system&action=edit&id=1">รายละเอียด</a></li>


                                    </ul>
                                </li>
                                <li class="<?= PAGE_CONTROLLERS == 'registration' ? 'active' : '' ?>"><a href="#"> <!-- Icon Container --> 
                                        <span
                                            class="da-nav-icon"> <img src="images/icon-about.png"
                                                                  width="32" height="32">
                                        </span>   สมัครสมาชิก
                                    </a>
                                    <ul>
                                        <li class="<?= PAGE_CONTROLLERS == 'registration' ? 'active' : '' ?>"><a  href="<?php echo ADDRESS_ADMIN_CONTROL ?>registration&action=edit&id=1">รายละเอียด</a></li>

                                    </ul>
                                </li>
                                <li class="<?= PAGE_CONTROLLERS == 'contact' || PAGE_CONTROLLERS == 'contact_message' || $_GET['type'] == 'contact' ? 'active' : ''
                                ?>"><a href="#"> <!-- Icon Container --> <span
                                            class="da-nav-icon"> <img src="../images/icon-contact.png"
                                                                  width="32" height="32">
                                        </span> ติดต่อเรา
                                    </a>
                                    <ul>
                                        <li class="<?= PAGE_CONTROLLERS == 'contact' ? 'active' : '' ?>"><a
                                                href="<?php echo ADDRESS_ADMIN_CONTROL ?>contact&action=edit&id=1">รายละเอียด</a></li>
                                        <li class="<?= PAGE_CONTROLLERS == 'contact_message' ? 'active' : '' ?>"><a
                                                href="<?php echo ADDRESS_ADMIN_CONTROL ?>contact_message">ข้อความ</a></li>
                                    </ul>
                                </li>
                                <li class="<?= PAGE_CONTROLLERS == 'footer' ? 'active' : '' ?>"><a href="#"> <!-- Icon Container --> <span
                                            class="da-nav-icon"> <img src="images/icon-social.png" 
                                                                  width="32" height="32">
                                        </span> Footer
                                    </a>
                                    <ul>
                                        <li class="<?= PAGE_CONTROLLERS == 'footer' ? 'active' : '' ?>"><a  href="<?php echo ADDRESS_ADMIN_CONTROL ?>footer&action=edit&id=1">Footer</a></li>


                                    </ul>
                                </li>

                            </ul>