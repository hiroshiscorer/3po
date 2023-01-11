@extends('layouts.app')

@section('content')
<main id="rules">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="title">Extended Rule Book</h2>
                <h3>INTRODUCTION</h3>
                <p>Welcome to the Star Cross Fighter League rulebook, which specifies the conditions and processes of tournament operations, conduct, requirements and administration requirements of competitors and staff.
                </p>
                <p>This web based rulebook is to be considered the latest version.</p>
                <ul class="numbered">
                    <li><h3>REGISTRATION CONDITIONS</h3>
                        <ul>
                            <li>Team roster can consist of a minimum of 3 and a maximum of 6 players, a minimum of 3 players must be registered before round 1. </li>
                            <li>Teams may make alterations to their roster at any time under the following conditions:
                                <ul>
                                    <li>A player may be added to a vacant roster position at any time (Note though conditions of Section 2)
                                    </li>
                                    <li>A non-locked player (see 1 b iii) can be removed from the roster or replaced by another player.</li>
                                    <li>Once a player has played a game for a team they are locked to that team's roster for the duration of the season.</li>
                                </ul>
                            </li>
                            <li>Teams will no longer apply for Open or Classic. This will be replaced by a multiple division scheme. The amount of divisions will depend on the amount of registered teams.</li>
                            <li>Division drafting in season 4 will be made based on historic data from the players in past SCFL events. In following seasons, the teams will be drafted based on the latest season performance.</li>
                            <li>Teams will be verified by SCFL staff. Teams are required to check in with staff on the discord server before the event commences.</li>
                            <li>All participants must have joined the <a href="https://discord.com/invite/BgYknw7bUu" target="_blank">StarCross Fighter League Discord server</a>.</li>
                            <li>Teams must name a team captain or representative that will be the point of contact for that team.</li>
                        </ul>

                    </li>
                    <li><h3>ROSTER ROTATION</h3>
                        <ul>
                            <li>All rostered players of a team must play a minimum of 2 games (or 1 round) during the season.</li>
                            <li>A team that fails to field a player without reasonable cause or notice will have 3 <strong>LEAGUE</strong> points subtracted for each player in this situation (e.g. Your team has 5 pilots, but only fielded 3 of them, then 6 points are deducted).
                            </li>
                            <li>2a and 2b apply to the <strong>LEAGUE</strong> format only.</li>
                        </ul>
                    </li>
                    <li><h3>STRUCTURE OF SCFL</h3>
                        <ul>
                            <li>SCFL will be divided in two phases, first a round-robin league format (<strong>LEAGUE</strong>) and then an elimination tournament format (<strong>SHIELD</strong>).</li>
                            <li><strong>LEAGUE</strong> will be split in divisions to try to match teams with similar skilled opponents. This phase will be played using round-robin to determine each division <strong>LEAGUE</strong> CHAMPION. Each round is to be played in a week by week basis.</li>
                            <li>Winners of each division will be determined by number of points. If tiebreakers are needed these will be KD ratio, then total kills and lastly the result of their match. If ties persist, a die will be rolled to break the tie.</li>
                            <li><strong>SHIELD</strong> will be held with special settings. This elimination phase will try to include as many teams as possible, starting from the top ranked teams in <strong>LEAGUE</strong> standings until a full bracket is filled.</li>
                            <li><strong>SHIELD</strong> will be also played in a weekly basis (one-day events tend to alienate many players, and we want as many players participating as possible).</li>
                        </ul>
                    </li>
                    <li><h3>DURATION AND PLAYABLE TIME/CONDITIONS OF LEAGUE ROUNDS</h3>
                        <ul>
                            <li>First round start and end dates will be announced every season. Registrations will close 48 hours before commencement.</li>
                            <li>Rounds will begin on Mondays 12:00pm UTC (7:00am CDT/EST, 8:00am EDT, 5:00am PDT) and will run to Sunday at 11:59am UTC time the following week (each round is 7 days long) until all rounds have been played.
                            </li>
                            <li>Match playing times are flexible arrangements that can be worked out through staff members and team captains, it is the team captains responsibility to arrange and communicate with team and opposing captains then to inform staff when arrangements are made.
                            </li>
                            <li>Rounds are permitted to be played in advance of the scheduled week of that round.</li>
                            <li>Matches for each round must be completed and results submitted on Discord by the end of each round with screenshots unless special arrangement is made.</li>
                            <li>Expected commitment of time by players is approximately 60 minutes per round. Allowing time to enter the lobby, time between matches and playing the two games of the round.
                            </li>
                            <li>Teams have a time limit of 30 minutes from the appointed time to enter the match lobby or give notice of being unable to attend. If notice is given the match can be postponed or commencement delayed. The sooner the notice, the better for everyone. Please respect everyone's time.
                            </li>
                            <li>If a team gives no notice and does not arrive within the 30 -minute time limit, then the round is considered abandoned by the non-arriving team and is declared a forfeit (under conditions of 10a) of the round by the non-arriving team with all 6 points of the round being awarded to the team that is present.
                            </li>
                            <li>No more than 2 rounds at any given time by one team are to be postponed to later rounds. If a team extends to a third round being postponed the earliest round under postponement will be declared a forfeit under conditions of Section 10 a.
                            </li>
                        </ul>
                    </li>
                    <li><h3>MATCH ADMISSION</h3>
                        <ul>
                            <li>Only participating teams, staff and casters may join the match lobby. The team playing as Galactic Empire will create the lobby and host the match.
                            </li>
                            <li>Only 3 team members per team are permitted in the game lobby as players when the match commences.
                            </li>
                            <li>Remaining team members may join the lobby as spectators.</li>
                            <li>A team may switch out a player between games including at a reset (under conditions of Section 5 g).
                            </li>
                            <li>Once a match proceeds to the hangar/ready room the teams are locked for that match.
                            </li>
                            <li>Only in-game players are allowed in team voice channels unmuted for the duration of the game. Non-participating team members may remain but muted, in stand-by. Staff members may enter to carry out match duty as required.
                            </li>
                            <li>In the event of an incidental disconnect or control failure during a game, the captain of the team can  instruct their team to exit the game on one occasion to allow a reset of the game only within the first three minutes of the game. If the first three minutes of the game have elapsed or the captain has used their one restart option, the game shall continue.
                            </li>
                            <li>A player who was disconnected is allowed to reconnect without penalty. Mid-game substitution is permitted one time only for the match duration in the event of the disconnect or control failure of another player defined under Section 5 g.
                            </li>
                            <li>Official casters appointed to the event may also join the lobby as a spectator. Players may stream their own content if they wish without restriction.</li>
                        </ul>
                    </li>
                    <li><h3>REPORTING OF RESULTS</h3>
                        <ul>
                            <li>Team captains are in charge of taking screenshots to verify data and match info which will be published into the corresponding discord channel. This will be used for recording results and generating standings and statistics.
                            </li>
                            <li>Staff will be encouraged to also take screenshots as a backup if possible. The responsibility ultimately lies upon the team captains.</li>
                            <li>The staff will record all results into the system and will confirm it has been processed.
                            </li>
                        </ul>
                    </li>
                    <li><h3><strong>LEAGUE</strong> MATCH PROCEDURES</h3>
                        <ul>
                            <li>MATCH FORMAT <br>
                                3v3 dogfight games <br>
                                20 kills game cap <br>
                                15 minutes per game time limit <br>
                                2 Games per round
                            </li>
                            <li>HOME / AWAY TEAM DETERMINATION AND RIGHTS
                                <ul>
                                    <li>The Home and Away teams are decided by a coin flip carried out in server by a bot or by using the <a href="https://trandom.zyp.mx/" target="_blank">TRAndomizer</a>. The winner of the coin flip is the home team.</li>
                                    <li>The Home team will decide with which faction to play first. The factions then alternate on the following game.
                                    </li>
                                    <li>The Away team will decide in which map to play first.</li>
                                    <li>Home team then chooses the map for the second game.</li>
                                </ul>
                            </li>
                            <li>LEAGUE POINTS SYSTEM <br>
                                Teams will be awarded points during the league phase based on the following game outcomes: <br>
                                3 points for a game win by more than 5 kills (e.g. 20 - 14, 20 - 10)<br>
                                2 points for a game win by less than or equal to 5 kills (e.g. 20 - 15, 20 - 18)<br>
                                2 points to each team if there is a game draw (e.g. 20 - 20, this may happen if you are 19 - 19 and there's two deaths almost simultaneously) <br>
                                1 point for a game loss by less than or equal to 5 kills<br>
                                0 points for a game loss by more than 5 kills <br>
                                <br>
                                For clarity, when the game software declares a winner, the game is over, the final on-screen score is then assessed to determine league points. If points are even on the game scoreboard then a draw will be declared.
                            </li>
                        </ul>
                    </li>
                    <li><h3><strong>SHIELD</strong> MATCH PROCEDURES</h3>
                        <ul>
                            <li>MATCH FORMAT <br>
                                3v3 dogfight games <br>
                                20 kills game cap <br>
                                15 minutes per game time limit <br>
                                2 Games per round
                            </li>
                            <li>HOME / AWAY TEAM DETERMINATION AND RIGHTS
                                <ul>
                                    <li>Home team is decided by coin flip carried out in server by bot or by using the <a href="https://trandom.zyp.mx/" target="_blank">TRAndomizer</a>. The winner of the coin flip is the Home team.</li>
                                    <li>The Home team will decide with which faction to play first. The factions then alternate on the following game.
                                    </li>
                                    <li>Both games will be played on the same map. The map MUST be randomized using the <a href="https://trandom.zyp.mx/" target="_blank">TRAndomizer</a> by a staff member or caster (see below). </li>
                                </ul>
                            </li>
                            <li>CRAFT AND LOADOUT
                                <ul>
                                    <li>Before starting the match, a staff member or caster should share their screen via discord and open the <a href="https://trandom.zyp.mx/" target="_blank">TRAndomizer</a></li>
                                    <li>Once both team captains are watching the shared screen, the caster or staff member will roll 3 random craft builds for New Republic, and 3 for Empire.</li>
                                    <li>Both teams should take note of these 6 random crafts and loadouts, as those are the loadouts that will be used in the games.</li>
                                    <li>Teams are free to choose which pilot will fly which loadout, as long as the three loadouts are used.</li>
                                    <li>When switching faction, the teams MUST fly the corresponding mirror loadouts. That means, they will fly the loadouts previously played by the opponent.</li>
                                </ul>
                            </li>
                            <li>
                                Winner of the matchup is determined by the result of adding the scoreboard of both games.
                            </li>
                            <li>If there is a tie (Both in-game scoreboard values are even once added), then another pair of games will be played with the map and loadouts randomized again. However, this time the match will last 10 minutes, with a 10 kill cap. (Instead of 15 minutes and 20 kills). If the tie persists, repeat the process for another pair of games, randomizing again, but from now on, halving all ship hull and shield modifiers (0.5 for first 2 games, then 0.2, then 0.1).
                            </li>
                        </ul>
                    </li>
                    <li><h3>BANNED LOADOUT ITEMS / LOADOUT VIOLATIONS</h3>
                        <ul>
                            <li>Use of identical auxiliary weapon loadouts on both auxiliaries of the same playable ship ("double conc" bug) will be considered a loadout offense and will be declared upon deployment of the ship onto the map.
                            </li>
                            <li>Turret mines - offense will not be registered until a turret or rocket mine is launched by a player onto the map. This rule does not apply for <strong>SHIELD</strong> tournament phase.</li>
                            <li>Rocket mines - offense will not be registered until a turret or rocket mine is launched by a player onto the map. This rule does not apply for <strong>SHIELD</strong> tournament phase.</li>
                            <li>When conditions described in 9 a, 9 b, or 9 c occur, the offending team will automatically forfeit the game under conditions of Section 10 a with the game ceasing immediately.</li>
                        </ul>
                    </li>
                    <li><h3>FORFEITS </h3>
                        <ul>
                            <li>In the event of a forfeit being declared the forfeiting team will receive 0 league points for each game forfeited and the opposing team will receive 3 points for each corresponding game .
                            </li>
                            <li>A team has the right to voluntarily forfeit a game or a round of games via notification from the team captain.
                            </li>
                        </ul>
                    </li>
                    <li><h3>DURATION AND FINAL PLACEMENT</h3>
                        <ul>
                            <li>League length will be determined by the number of rounds, which are in turn determined by the number of teams in each division.
                            </li>
                            <li>Divisions will have a minimum of 4 teams, and a maximum of 7 teams; always targeting an ideal of 6 teams per division. If uneven teams are signed up, then the higher divisions will house the additional teams. (e.g. If we have 11 teams, then it would be 6 on the higher division, and 5 on the lower one.)</li>
                            <li>The team that accumulated the most points on the <strong>LEAGUE</strong> table of their division will be declared <strong>LEAGUE</strong> CHAMPION for that division. All round results must be declared and entered to enable the declaration.
                            </li>
                            <li>The structure of the <strong>SHIELD</strong> phase will be finalized and released to the competitors at most 48 hours after the last match/forfeit has been entered into the system and all teams have responded to the invite.
                            </li>
                        </ul>
                    </li>
                    <li><h3>PARTICIPANT DISCIPLINE</h3>
                        <ul>
                            <li>All participants must have joined the StarCross Fighter League Discord server. To participate they are subject to server rules for the duration of the event.
                            </li>
                            <li>An infraction that results in removal from the server will also result in removal from the event.</li>
                            <li>All participants are expected and required to follow the SEF code of conduct for the duration of the event (See appendix B). Note that penalties applied to a player from any SEF tournament regarding the code of conduct from January 1st 2022 will be applied to all SEF affiliated leagues and competitions including the StarCross Fighter League.</li>
                            <li>Behavior towards other players, staff and casters should be respectful at all times.</li>
                            <li>Application to register for the duration of the event denotes an acceptance of the rules and conditions outlined in this document (this extends to both <strong>LEAGUE</strong> and <strong>SHIELD</strong>).
                            </li>
                        </ul>
                    </li>
                    <li><h3>RULES NOT LISTED AND RULE UPDATES</h3>
                        <ul>
                            <li>StarCross Fighter League Officials hold all rights to apply, construct, and interpret the rules. The application, construction, and interpretation of these rules will be final and binding.
                            </li>
                            <li>The League officials reserve the right to add, change or modify these rules at any time without limit.
                            </li>
                            <li>The rulings from the decisions or interpretations are enforceable at the time issued.
                            </li>
                        </ul>
                    </li>
                    <li><h3>APPENDIX A - DIVISION PERFORMANCE TABLE</h3>
                        In order to draft teams up or down the division ladder, the following criteria will be used and applied to past season standings before the next one starts. This procedure will be used starting on Season 5:<br>
                        <table class="mtop30">
                            <tr>
                                <th>Amount of teams in division</th>
                                <th>Amount Promoted</th>
                                <th>Amount Demoted</th>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>2</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>1</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                        </table>
                    </li>
                    <li><h3>APPENDIX B - SEF Code of Conduct</h3>
                        "This Code of Conduct is applicable across all leagues that are part of the Squadrons Esports Federation (SEF). We aim to foster a place for players to engage in competitive matches within a safe and friendly environment. In case of discrepancy among rule sets, the prevailing one will always be the one published by SEF itself.
                        <ul>
                            <li>Be respectful to the league owners, staff, referees, casters, and others involved in the daily operation of the league.
                            </li>
                            <li> Community moderators have final say on all decisions.</li>
                            <li>Be respectful of other players, teams, fans, and other audience members. You represent your team and the league as you play.</li>
                            <li>No bigotry, harassment, hate speech, racism, or other forms of personal attacks.
                            </li>
                            <li>No political or religious statements or content.
                            </li>
                            <li>No sexually explicit content or references.
                            </li>
                            <li>Explicit language is not to be directed at any pilot, player, or individual and must be limited in use.
                            </li>
                            <li>No solicitation without permission from the SEF.</li>
                            <li>Keep self-promotion to the appropriate channels.
                            </li>
                            <li>Follow Discord’s Terms of Service and Community Guidelines.</li>
                            <li>Comments, content, and posts that are not acceptable will be removed by moderators and/or server administration.</li>

                        </ul>
                        A three (3) warning system is in place. Each level of warning deals stronger punishments and will lead to eventual removal from the league.
                        <ul>
                            <li>Timeout for 24 hours
                            </li>
                            <li>Timeout for 7 days</li>
                            <li>Ban</li>
                        </ul>
                    </li>
                </ul>

                <p class="end-of-rules">end of rules document</p>
                <h4>UPDATES TO RULES</h4>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Update(s) made</th>
                    </tr>
                    <tr>
                        <td>30th Oct 2021</td>
                        <td><b>Section 6a</b> - Changed to allow team playing Empire to host. Removed referees responsibility to create lobby.<br>
                        <b>Section 11a</b> - Extended playoff rule publication by 1 round, consideration for SEF commitments, onboarding new casters etc.<br>
                        </td>
                    </tr>
                    <tr>
                        <td>15th Nov 2021
                        </td>
                        <td><b>Section 1</b> - Updated rules for adding players to roster and locking players to roster - Updated reference points on sub articles<br>
                        <b>Section 13</b> - Title now includes UPDATES<br>

                        </td>
                    </tr>
                    <tr>
                        <td>8th Jan 2022

                        </td>
                        <td><b>Section 6g</b> - Added allowance for a single player sub in event of disconnect or control failure. Shortened allowable time to 3 mins. Added quit out procedure. Clarified language for match and game.<br>
                        <b>Section 8c</b> - Revised language for game/match.
                        Added <b>Section 12c</b> - SEF code of conduct and application of penalties. 12c and 12d are now renamed to 12d and 12e<br>
                        <b>Section 4</b> - Expanded to 14 teams in 2 conferences with 7 team or less provision.<br>
                        <b>Section 1f</b> - Altered the registration criteria for player/team eligibility in League Div.<br>
                        <b>Section 8c</b> - Clarified meaning of a drawer in scores.<br>
                        <b>Appendix A</b> - “Teams Not Permitted to Register For League Division”
                        Added<br>
                            <b>Appendix B</b> - “SEF Code of Conduct” Added<br>
                        </td>
                    </tr>
                    <tr>
                        <td>9th Jan 2022
                        </td>
                        <td><b>Section 1c</b> - Altered comp names and references for SCFL Open and SCFL Classic<br>
                        <b>Section 1d, 1e, 1f, 2c, 4c, 6h</b> - Updated competition name references.<br>
                        <b>Section 3</b> - Updated to “SCFL Classic” Comp name change<br>
                        <b>Section 4</b> - Updated to “SCFL Open” Comp name change<br>
                        <b>Appendix A</b> - Updated comp name reference<br>

                        </td>
                    </tr>
                    <tr>
                        <td>30th Aug 2022</td>
                        <td>Major overhaul of sections to include the reformed LEAGUE and SHIELD system, removing CLASSIC and OPEN divisions.<br>
                        Added clarity by changing and repurposing terms such as tournament, event, league, playoff, round-robin, etc.<br>
                        </td>
                    </tr>
                    <tr>
                        <td>27th Sep 2022</td>
                        <td><b>Section 8d</b> - Added clarity on how the winner of a SHIELD matchup is determined.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
