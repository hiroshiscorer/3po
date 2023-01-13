@extends('layouts.app')

@section('content')
<main id="rules">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="title">3 Players Only League Rule Book</h2>
                <p class="justify-last-center">3 Players Only League is a 3v3 Fleet Battles league for all, the league is split into divisions so that all the games will be as close and intense as possible. The league format will allow those who don't have the time or are in an awkward timezone to compete in the Cadet Cup, an oportunity to play in this format and hopefully have a great time. League matches are played at a time both teams agree on, this means you can potentually play at anytime and won't have to play 10 games in a row.</p>

                <h3>League Format</h3>
                <p>The League will be split into multiple divisions to keep the games as close as possible.</p>
                <p>The Divisions are currently Rancor, Nexu, Bantha, Mynock, Porg. At the end of a season the top 2 teams in a division will move up to a higher division (except in Rancor) and the bottom 2 teams will move down a division (except in Porg).</p>
                <p>A season will last for 8 weeks + 2 play in weeks for new teams, with every team playing every other team in a division once.</p>
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
                <p>The Play In system will be determined when the Play Ins start, the system used depends on the amount of sign ups and leavers.</p>
                <p>Roster rules are applied as normal during the Play In for the upcoming season, except for players who were rostered for the team in the prievious season are not roster locked for the upcoming season during Play In Matches.</p>

                <h3>Hosting and Faction</h3>
                <p>Empire team hosts the match using the below modifiers.</p>
                <p>Faction is picked by the first team in the matchup chat to say 'Empire' or 'New Republic'.</p>
                <p>All matches are Bo2, so Factions and Host will flip after game 1.</p>

                <h3>Disconnects</h3>
                <p>If a player suffers a disconnect BEFORE the opening flip occurs, their team may restart the game.</p>
                <p>ALL of the players' team must leave the game within a minute of the disconnect or before the flip occurs for the match to be restarted.</p>
                <p>Do NOT leave the match if you suspect the enemy team to have a disconnect, keep playing as normal until the game ends.</p>

                <h3>Tournament Modifiers and Bans</h3>
                <p>Due to the 3v3 format, the tournament will feature modifiers to frigate, corvette, and flagship health. Other modifiers may be introduced as well.</p>

                <h4>Modifiers:</h4>
                <ul class="bulleted">
                    <li>MATCH TIME 20mins</li>
                    <li>KICKOFF TIME 3mins</li>
                    <li>0.8 FLAGSHIP HULL</li>
                    <li>0.8 FRIGATE HULL</li>
                    <li>0.6 RAIDER HULL</li>
                </ul>

                <h4>Bans:</h4>
                <ul class="bulleted">
                    <li>Double Conc Missile</li>
                </ul>

                <h3>Cookie System</h3>
                <p>The Cookie System is a way for Teams to track points accross multiple seasons, a Team will be locked to its Team Captain. A team must play at least 3 matchups to receive cookies at the end of a season.</p>

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
                <p>Team Capains can sign up with a team of between 3-6 pilots.</p>
                <p>You can also sign up as a Mercenary Solo, Duo or Trio and be put with other teams when needed and hopefully make some new friends!</p>
                <p>New teams that sign up will play in the next play ins to start the next season.</p>

            </div>
        </div>
    </div>
</main>
@endsection
