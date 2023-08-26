@extends('layouts.app')

@section('content')
<main id="rules">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="title">3 Players Only League Rule Book</h2>
                <p class="justify-last-center">3 Players Only League is a 3v3 Fleet Battles league for all, the league is split into divisions so that all the games will be as close and intense as possible. League matches are played at a time both teams agree on.</p>

                <h3>League Format</h3>
                <p>The League will be split into multiple divisions to keep the games as close as possible.</p>
                <p>The nominal Divisions are Rancor, Nexu, Bantha, Mynock, Porg. If there are not enough teams to fill a minimum of 4 teams per division, then less divisions will be open. At the end of a season the top 2 teams in a division will move up to a higher division (except in Rancor) and the bottom 2 teams will move down a division (except in Porg).</p>
                <p>A season will last 1 week per matchup, plus 2 additional weeks for late matches. Every team will play against every other team in the same division once.</p>
                <p>Every map will be played across a season:</p>
                <ul>
                    <li>Round 1 - <strong>Sissubo</strong></li>
                    <li>Round 2 - <strong>Yavin Prime</strong></li>
                    <li>Round 3 - <strong>Fostar Haven</strong></li>
                    <li>Round 4 - <strong>Zavian Abyss</strong></li>
                    <li>Round 5 - <strong>Galitan</strong></li>
                    <li>Round 6 - <strong>Esseles</strong></li>
                    <li>Round 7 - <strong>Nadiri Dockyards</strong></li>
                </ul>

                <h3>End of Season Ties</h3>
                <p>In the event of a points tie at the end of a season the following will occur: The result of the match up between the teams will determine placing. If that it is a draw the teams will schedule and partake in a 3v3 Last Team Standing Dogfight.</p>

                <h4>3v3 LTS DFTB:</h4>
                <p>Same Map as the match up for the teams was played. Empire Host.</p>
                <p>Coinflip - winner picks either Faction or an opponent ship ban, loser gets the other.</p>
                <p>Once a player dies they MUST leave the match.</p>
                <p>Modifiers (Dogfight):</p>
                <ul class="bulleted">
                    <li>POINTS TO WIN 3</li>
                    <li>MATCH TIME 5</li>
                    <li>BAN The 1 Selected Ship</li>
                    <li>RESUPPLY NODES DISABLED</li>
                    <li>RESPAWN TIME 60</li>
                </ul>

                <h3>Play In Weeks</h3>
                <p>New teams will enter 3PO League at the beginning of a season. The Play In weeks will be used to determine their division for the upcoming season.</p>
                <p>The Play In system will be determined by the event organizer to the best of his abilities.</p>
                <p>Play Ins count as part of the season for the purpose of locking pilots to a team.</p>
                <p>Play-Ins are BO2, just as in regular season.</p>
                <p>The first team to type anything on the play-in channel (team A) will choose which faction to fly first, and the other team (team B) will choose the map. For the second game, teams should flip faction as usual and team A chooses second map. In case of a draw, follow the same procedure as End of Season Ties (see above) but randomize the map. You can use the
                    <a class="generic-link" href="https://trandom.zyp.mx" target="_blank">TRAndomizer</a>.</p>

                <h3>Hosting and Faction</h3>
                <p>Empire team hosts the match using the below modifiers.</p>
                <p>Faction is picked by the first team in the matchup chat to say 'Empire' or 'New Republic'.</p>
                <p>All matches are Bo2, so Factions and Host will flip after game 1.</p>

                <h3>Disconnects</h3>
                <p>If a player suffers a disconnect BEFORE the opening flip occurs, their team may restart the game.</p>
                <p>ALL of the players' team must leave the game within a minute of the disconnect or before the flip occurs for the match to be restarted.</p>
                <p>Do NOT leave the match if you suspect the enemy team to have a disconnect, keep playing as normal until the game ends.</p>

                <h3>Tournament Modifiers and Bans</h3>
                <p>Due to the 3v3 format, the tournament will feature modifiers to frigate, corvette, and flagship health, among others.</p>

                <h4>Modifiers:</h4>
                <ul class="bulleted">
                    <li>Match Time: 20 min</li>
                    <li>Imperial Max Hull: 1.3</li>
                    <li>Auxiliary Count: 1.5</li>
                    <li>New Republic Flagship Hull: 1.2</li>
                    <li>New Republic Capital Ship Hull: 1.2</li>
                    <li>New Republic Capital Ship Shields: 1.2</li>
                    <li>New Republic Corvette Hull: 0.8</li>
                    <li>Imperial Raider Hull: 0.8</li>
                </ul>
                <h4>Banned Components:</h4>
                <ul class="bulleted">
                    <li>TIE Bomber cannot run Reinforced Hull</li>
                    <li>TIE Fighter cannot run Reinforced Hull</li>
                    <li>TIE Defender cannot run Dampener Hull</li>
                    <li>Double Conc Missile</li>
                </ul>
                <h4>Mandated Components:</h4>
                <ul class="bulleted">
                    <li>TIE Defender must run Nimble Shields</li>
                </ul>

                <h3>Cookie System</h3>
                <p>The Cookie System is a way for Teams to track points across multiple seasons, however only wookie9c knows how it works, so this system is frozen until wookie9c returns.</p>

                <table>
                    <thead>
                    <tr>
                        <th>Rancor</th>
                        <th>Nexu</th>
                        <th>Bantha</th>
                        <th>Mynock</th>
                        <th>Porg</th>
                        <th>Extra </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1st - 210</td>
                        <td>1st - 150</td>
                        <td>1st - 100</td>
                        <td>1st - 60</td>
                        <td>1st - 30</td>
                        <td>1st - 10</td>
                    </tr>
                    <tr>
                        <td>2nd - 198</td>
                        <td>2nd - 140</td>
                        <td>2nd - 92</td>
                        <td>2nd - 54</td>
                        <td>2nd - 26</td>
                        <td>2nd - 8</td>
                    </tr>
                    <tr>
                        <td>3rd - 186</td>
                        <td>3rd - 130</td>
                        <td>3rd - 84</td>
                        <td>3rd - 48</td>
                        <td>3rd - 22</td>
                        <td>3rd - 6</td>
                    </tr>
                    <tr>
                        <td>4th - 180</td>
                        <td>4th - 125</td>
                        <td>4th - 80</td>
                        <td>4th - 45</td>
                        <td>4th - 20</td>
                        <td>4th - 5</td>
                    </tr>
                    <tr>
                        <td>5th - 174</td>
                        <td>5th - 120</td>
                        <td>5th - 76</td>
                        <td>5th - 42</td>
                        <td>5th - 18</td>
                        <td>5th - 4</td>
                    </tr>
                    <tr>
                        <td>6th - 168</td>
                        <td>6th - 115</td>
                        <td>6th - 72</td>
                        <td>6th - 39</td>
                        <td>6th - 16</td>
                        <td>6th - 3</td>
                    </tr>
                    <tr>
                        <td>7th - 162</td>
                        <td>7th - 110</td>
                        <td>7th - 68</td>
                        <td>7th - 36</td>
                        <td>7th - 14</td>
                        <td>7th - 2</td>
                    </tr>
                    <tr>
                        <td>8th - 156</td>
                        <td>8th - 105</td>
                        <td>8th - 64</td>
                        <td>8th - 33</td>
                        <td>8th - 12</td>
                        <td>8th - 1</td>
                    </tr>
                    </tbody>
                </table>

                <h3>Mercenaries</h3>
                <p>Participants who have not had the opportunity to field a team may sign on as a mercenary.</p>
                <p>Mercenaries may be pinged by a team who are struggling to field a squad. Once a mercenary plays for a team they are locked to that teams roster for the rest of the season.</p>

                <h3>Signing Up and Dates</h3>
                <p>Team Captains must sign up with a team of minimum of 3 pilots. Higher limit has been removed.</p>
                <p>You can also sign up as a Mercenary Solo, Duo or Trio and be put with other teams when needed and hopefully make some new friends!</p>
                <p>New teams that sign up will play in the next play-ins to start the next season.</p>
                <p>Teams may line up any of their registered pilots or not without consequence. Teams may register new pilots mid-season, but this will make Scorer cry a bit. The only restriction is that once a pilot flew for a team, they are locked to that team for the rest of the season.</p>

            </div>
        </div>
    </div>
</main>
@endsection
