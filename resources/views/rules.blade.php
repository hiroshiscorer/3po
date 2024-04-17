@extends('layouts.app')

@section('content')
<main id="rules">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="title">Sabacc League Rule Book</h2>
                <p class="small">(Squadrons Jumbled Team European Chance Championship or Squadrons: A Balanced Alternative Casual Competition or… we’ve got lots of ideas and aren’t really sold on any of them. You are welcome to make suggestions.)</p>
                <h3 class="text-left">Vision:</h3>
                <p>We would like this competition to be a laid-back, competitive format for Squadron players of all skill levels who are active at European friendly times. We have the ambition to make the format accessible and rewarding for players new to the competitive scene, while also offering a challenge to more experienced players.<br><br>First and foremost, we want to have fun.</p>

                <ol>
                    <li>
                        <h3 class="text-left">Format and points:</h3>
                        <ul class="bulleted">
                            <li>5 vs. 5 fleet battles</li>
                            <li>BO2 (best of two) match format with both games being played on the same map and each team playing one game as New Republic (NR) and one as Galactic Empire (GE)</li>
                            <li>The team playing GE will host the game.</li>
                            <li>The number of teams in the competition will be defined after the registration has closed. The typical roster size will be 7-8 pilots.</li>
                            <li>Three points will be awarded to the winning team of each match-up and one point per team will be awarded in case of a draw. The outcome of all games is documented by screenshots. Both teams should take a screenshot of the scoreboard before any players leave the lobby after a game.</li>
                            <li>The competition format will be a round robin (all-play-all-tournament). The time frame for the competition will be three weeks with one extra week available as a catch-up if needed.</li>
                            <li>The map selection on the first game per match up will be set using the <em>Will of the Force</em> bot by typing <code>/r command:map</code> in the match channel. If a caster is available the caster will use the command, otherwise one of the captains uses it. The same map will then also be used for the 2nd game in the match-up. A team who has already played a certain map twice during the tournament may request re-running the map selection until another map then the one they have already used twice is selected.</li>
                            <li>The first team in a match-up to request a faction in the text chat will have the right to choose faction (so be fast if you have a faction preference).</li>
                        </ul>
                    </li>
                    <li>
                        <h3 class="text-left">Roster formation:</h3>
                        <p>All registered players are assigned a tier by the Senior Admins. There are four tiers named after the four suits in Sabacc (Flasks, Sabers, Staves and Coins).</p>
                        <ul class="bulleted">
                            <li><strong>Flasks:</strong> Players who are in a seed 1-5 team on SCL (including retired players who have last played in group A or B)</li>
                            <li><strong>Sabers:</strong> Players who are in a seed 5-10 team on SCL (including retired players who have last played in group C) and players who are roster locked for a 3PO Rancor team</li>
                            <li><strong>Staves:</strong> Players who are in a seed 11-16 team on SCL (including retired players who have last played in group D or group E) and players who are roster locked for a 3PO Bantha team</li>
                            <li><strong>Coins:</strong> All players with no previous experience in competitive Squadrons or players who have only played the 1st Sabacc tournament but no other competitive formats</li>
                        </ul>
                        <p>Should a player play in both SCL and 3PO, the SABACC tier assignment will be based on the highest league placement of the player (example: a player is roster locked for a 3PO Rancor team and a SCL seed 11-16 team → the SABACC tier of the player will be Saber). If a player has played in one tier in Sabacc season 1 but is assigned a different tier now the admins have the right to decide to keep the season 1 tier if they deem it more appropriate to the players skill or Sabacc team allocation.</p>
                        <p>Teams are assigned randomly, with each team getting a broadly equal number of Flasks, Sabers, Staves and Coins pilots. The Senior Admins have the right to make manual adjustments to this random assignment if for instance one team ends up without anyone who can fly support. Manual adjustments should be an exception and must be communicated transparently by the admins.</p>
                        <p><em>Example:</em></p>
                        <p>22 pilots have signed up for the competition. 3 in Flasks, 5 in Sabers, 7 in Staves and 7 in Coins -> Three teams with 7-8 players can be formed.</p>
                        <ul class="bulleted">
                            <li>Team1 gets 1 Flask, 2 Sabers, 2 Staves and 3 Coins</li>
                            <li>Team2 gets 1 Flask, 2 Sabers, 2 Staves and 2 Coins</li>
                            <li>Team3 gets 1 Flask, 1 Saber, 3 Staves and 2 Coin</li>
                        </ul>
                        <p>(and yes, we are aware that there is a chance that all players ending up on one team could be flex pilots – this is a laid-back format and flying off role and/or off meta is absolutely part of it in case the “jumbled” in the competition name did not tip you off)</p>
                    </li>
                    <li>
                        <h3 class="text-left">Modifiers:</h3>
                        <ul class="bulleted">
                            <li>SCL modifiers will be used (see list of modifiers at the end of this document)</li>
                            <li>Players in the Coins tier will be exempt from the SCL component bans meaning they can use any load out for their ships (for instance reinforced hull on the Tie bomber).</li>
                            <li>Player in the Staves tier will use the SCL mandates on components.</li>
                            <li>Players in the Flasks and Saber tiers will face additional component bans on top of those mandated by SCL. For the list of bans see section 10.</li>
                        </ul>
                    </li>
                    <li>
                        <h3 class="text-left">Scheduling and substitutes:</h3>
                        <ul class="bulleted">
                            <li>Matches should be scheduled to start between 6-8pm UTC / 8-10pm CEST.</li>
                            <li>It is expected that, in the spirit of the competition, teams will make every effort to schedule games at a time convenient for most players on both sides and not schedule matches around the availability of one player.</li>
                            <li>Players available for a match must take part in at least one game of the best of 2 series. An exception is make for a Flask or Saber player who has chosen to act as Team Coach for their team during both games in a series (for the avoidance of doubt: a Coin or Staves player cannot be Team Coach in both games in a match).</li>
                            <li>Substitutes are allowed. There is no limit to how many substitutes a team may use, but only substitutes from a lower tier than the player they replace are permitted (for example a Staves player can sub for a Swords player but not the other way around). The only permitted exception is substitutes for Coins players who are allowed to be substituted by another Coins player). The Senior Admins will not grant any exceptions from this rule no matter if a player flies on-role or off-role.</li>
                            <li>If a team has 5 pilots available for a match but would like to use one of their available Flask or Saber pilots as Team Coach they are permitted to use a substitute to fill the 5<sup>th</sup> pilot spot. The same substitute rules as above apply (aka the missing player can only be replaced by a lower tier substitute).</li>
                            <li>A team which is short a player and cannot find a lower tier substitute can either choose to play short-handed or forfeit.</li>
                        </ul>
                    </li>
                    <li>
                        <h3 class="text-left">How to sign up:</h3>
                        <p>Sign up for SABACC is done per person not per team. The sign up is on the Lucky Sabacc Shift (LSS) Server in the #Sabacc-registration-office channel. Writing a post with your in-game name in this channel constitutes a registration for the championship. If you are willing to captain a team or cast matches, please mention this as well.</p>
                        <p>Important note: Scheduling matches is always a challenge. We want to make the job for the team captains as easy as possible. Only players who are available to start matches between 6pm-8pm UTC / 8-10pm CEST should sign up. This does not mean that you have to be available the entire time between 6pm-8pm UTC / 8-10pm CEST or that you are available every day. The intention is only to have a reasonable chance to schedule at least some matches on weekdays to avoid potential scheduling clashes with SCL matches.</p>
                    </li>
                    <li>
                        <h3 class="text-left">VC rules and the Team Coach:</h3>
                        <p>It is allowed to spectate SABACC games provided the spectator does not sit in the same VC (voice chat) as the pilots flying in the game.</p>
                        <p>The two teams flying a match up should use a VC in the LSS server (one per team).</p>
                        <p>If both teams have a sixth rostered player available for a match, they are allowed to assign the Team Coach role to this player. The Team Coach is allowed to spectate the match and give strategy information and advice to their team.</p>
                        <ul class="bulleted">
                            <li>The Team Coach may change between game 1 and 2 in a match.</li>
                            <li>The Team Coach is allowed to both spectate their own team as well as the opponent team during all phases of the game</li>
                            <li>The Team Coach is not allowed to be used if only one of the teams has a sixth player available</li>
                        </ul>
                        <p>Comments by the Senior Admins on the Team Coach role: <br>To our knowledge the use of a Team Coach has not been previously tried in a competitive format and is experimental. Our intention by allowing the Team Coach mechanic is twofold:</p>
                        <ol>
                            <li>We hope that the Team Coach will add a new element of strategy to the game play which will be fun and interesting to explore even for experienced players. We expect that information like what load outs the opponents have, who is being targeted, who the ion carrier is and what capital ship they go for and if opponent marks are ready on the start of the flag ship defense might change the tactics a bit and add some interesting new options.</li>
                            <li>We hope that the Team Coach can provide some help and guidance to newer players to help call shots, coordinate and time phase flips. We would like to emphasize the need for a coaching mind set in this. We think everyone who plays Squadrons has been in situations where they have overlooked things or have overextended due to too much happening at once. The Team Coach should try to help mitigate these situations by offering additional information and insights in a constructive fashion.</li>
                        </ol>
                        <p>(And to everyone who is concerned that the Team Coach idea is breaking the realism and immersion: Just imagine Galactic Empire has developed an ultimate new spy and cloaking device deployed in the battle zone. However, some Bothan spies have stolen the source code, so the New Republic also has deployed a spying device in the battle zone to even the field. BAMM everything is super realistic 😉)</p>
                    </li>
                    <li>
                        <h3 class="text-left">Admins</h3>
                        <p>The whole point of this event is to have fun and to have some laid-back, reasonably well-balanced games that players of all skill levels and experience can enjoy.</p>
                        <p>However, we appreciate that “good fences make good neighbors” and as such the competition has three Senior Admins: Schneeflockchen, PaddyBatman and DecoyTango who will answer questions, take on feedback and consider constructive suggestions, and resolve any issues that may arise. Each intends to play in the competition and therefore acknowledges a potential conflict of interest. Senior Admins will recuse themselves from involvement in the resolution of any issue directly involving them or their team / teammates but otherwise will consider issues collectively.</p>
                        <p>The Senior Admins will aim to operate with as much transparency as possible, but participants are asked to understand that this is not always possible. The decision of the Senior Admins is final.</p>
                    </li>
                    <li>
                        <h3 class="text-left">Rules of Conduct</h3>
                        <p>We emphasize that this competition is being organized so that Squadrons pilots who wish to play in EU-friendly time zones can have fun.</p>
                        <p>Therefore:</p>
                        <ul class="bulleted">
                            <li> We expect courtesy and empathy from all participants</li>
                            <li> The competition is an LGBTQIA+ friendly environment</li>
                            <li> No NSFW content</li>
                            <li> No hate speech</li>
                            <li> Take care and think carefully before talking about sensitive topics (including politics and religion)</li>
                            <li> Respect the Admins</li>
                            <li> Basically, be nice to each other!</li>
                        </ul>
                        <p>Senior Admins will take appropriate action when dealing with anyone not meeting expected standards of conduct which may include permanently removing a player from the competition.</p>
                    </li>
                    <li>
                        <h3 class="text-left">Miscellaneous (Disconnects, draws, …):</h3>
                        <ul class="bulleted">
                            <li>If a team has a disconnect right at the start of the match (=within 30s of the match start and before the flip is decided) the team may leave the game and request a restart. For the restart the same map as in the original game will be used.</li>
                            <li>If a team has a disconnect at a later point in the game another player of this team (reserve bench or the team coach) is allowed to join the game as a replacement. Note: Players on the reserve bench may sit in the same VC at the rest of the team but must be muted until the disconnect occurs and are not allowed to spectate the game (they are allowed to watch the stream if the game I streamed). The ban to spectate does not apply to the team coach.</li>
                            <li>OOP (out of phase) of a flagship before both mid-ships are destroyed is permitted. The admins are aware that this is a topic which has seen much discussion in other leagues the past. Therefore we want to explain why we explicitly allow such OOP: We think it highly unlikely that such an OOP is possible in SABACC given the component bans and the random team composition. However, should a team succeed in training up their lower tier pilots to successfully perform such OOP in a match, we believe they fully deserve the win considering that they have very much acted in the spirit of this competition by spending much time coaching their lower tier team members and teaching them the intricacies of Squadrons.</li>
                            <li>Should two teams have an equal number of points at the end of the championship, the result of the match between the teams will determine the teams’ rank. Should the match between the teams be a draw, the team with the lower number of deaths in the match between them will be ranked higher.</li>
                            <li>Should more than two teams be tied for points and are in a stalemate in their direct matchups, the sum of the total number of death in their direct matchups will decide. If even the number of direct death is equal a BO3 final match will be played to determine the tournament champion.</li>
                        </ul>
                    </li>
                    <li>
                        <h3 class="text-left">List of modifiers</h3>
                        <h4>Basic Settings</h4>
                        <table>
                            <tbody>
                            <tr>
                                <td>Game Mode:</td>
                                <td>Fleet Battles</td>
                            </tr>
                            <tr>
                                <td>Game Mode Settings:</td>
                                <td>Match Time: 30 (default)</td>
                            </tr>
                            <tr>
                                <td>Kickoff Time:</td>
                                <td>2min (default)</td>
                            </tr>
                            <tr>
                                <td>Privacy Level:</td>
                                <td>Public</td>
                            </tr>
                            <tr>
                                <td>Has Password:</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td>Determined by host in match chat</td>
                            </tr>
                            <tr>
                                <td>Suggested Skill Level:</td>
                                <td>Average</td>
                            </tr>
                            <tr>
                                <td>Allow Join After Match:</td>
                                <td>Yes</td>
                            </tr>
                            </tbody>
                        </table>

                        <h4>Restrictions:</h4>
                        <table>
                            <tbody>
                            <tr><td>None</td></tr>
                            </tbody>
                        </table>

                        <h4>Modifiers:</h4>
                        <table>
                            <tbody>
                            <tr>
                                <td>New Republic Starfighter Hull:</td>
                                <td>1.1</td>
                            </tr>
                            <tr>
                                <td>Imperial Starfighter Hull:</td>
                                <td>1.2</td>
                            </tr>
                            <tr>
                                <td>New Republic Starfighter Shields:</td>
                                <td>0.9</td>
                            </tr>
                            <tr>
                                <td>Imperial Starfighter Shields:</td>
                                <td>0.9</td>
                            </tr>
                            <tr>
                                <td>Respawn Time:</td>
                                <td>25s</td>
                            </tr>
                            <tr>
                                <td>New Republic Flagship Hull:</td>
                                <td>1.7</td>
                            </tr>
                            <tr>
                                <td>New Republic Flagship Shields:</td>
                                <td>1.5</td>
                            </tr>
                            <tr>
                                <td>Imperial Flagship Hull:</td>
                                <td>1.5</td>
                            </tr>
                            <tr>
                                <td>Imperial Flagship Shields:</td>
                                <td>1.5</td>
                            </tr>
                            <tr>
                                <td>New Republic Capital Ship Hull:</td>
                                <td>1.7</td>
                            </tr>
                            <tr>
                                <td>New Republic Capital Ship Shields:</td>
                                <td>1.5</td>
                            </tr>
                            <tr>
                                <td>Imperial Capital Ship Hull:</td>
                                <td>1.5</td>
                            </tr>
                            <tr>
                                <td>Imperial Capital Ship Shields:</td>
                                <td>1.5</td>
                            </tr>
                            </tbody>
                        </table>

                        <h4>Banned/mandated Components for Coins:</h4>
                        <table>
                            <tbody>
                            <tr>
                                <td>None</td>
                            </tr>
                            </tbody>
                        </table>

                        <h4>Banned/mandated components for Staves:</h4>
                        <table>
                            <tbody>
                            <tr>
                                <td>TIE Bomber cannot run Reinforced Hull</td>
                            </tr>
                            <tr>
                                <td>TIE Fighter cannot run Reinforced Hull</td>
                            </tr>
                            <tr>
                                <td>TIE Defender cannot run Dampener Hull</td>
                            </tr>
                            <tr>
                                <td>X-wings cannot run Scrambler Shields</td>
                            </tr>
                            <tr>
                                <td>TIE Defender must run Nimble Shields</td>
                            </tr>
                            </tbody>
                        </table>

                        <h4>Banned/mandated components for Sabers:</h4>
                        <table>
                            <tbody>
                            <tr>
                                <td>TIE Bomber cannot run Reinforced Hull</td>
                            </tr>
                            <tr>
                                <td>TIE Fighter cannot run Reinforced Hull</td>
                            </tr>
                            <tr>
                                <td>TIE Defender cannot run Dampener Hull</td>
                            </tr>
                            <tr>
                                <td>X-wings cannot run Scrambler Shields</td>
                            </tr>
                            <tr>
                                <td>TIE Defender must run Nimble Shields</td>
                            </tr>
                            <tr>
                                <td>Support cannot run Beacons</td>
                            </tr>
                            <tr>
                                <td>X-wings, TIE-fighters and TIE defenders cannot run ion missiles</td>
                            </tr>
                            <tr>
                                <td>Y-wings and TIE Bombers can only run one farming auxiliary (Goliath missiles or multi lock missiles but not both)</td>
                            </tr>
                            <tr>
                                <td>A Saber pilot who flies off role is exempt from the banned/mandated components applicable for Saber and may instead use the components banned/mandated for Stave pilots.</td>
                            </tr>
                            <tr>
                                <td>Note1: typically only the pilot’s worst of the three roles (support, flex and OBJ/farm) is considered off- role unless the pilot is well known to only ever fly one role.</td>
                            </tr>
                            </tbody>
                        </table>

                        <h4>Banned/mandated components for Flasks:</h4>
                        <table>
                            <tbody>
                            <tr>
                                <td>TIE Bomber cannot run Reinforced Hull</td>
                            </tr>
                            <tr>
                                <td>TIE Fighter cannot run Reinforced Hull</td>
                            </tr>
                            <tr>
                                <td>TIE Defender cannot run Dampener Hull</td>
                            </tr>
                            <tr>
                                <td>X-wings cannot run Scrambler Shields</td>
                            </tr>
                            <tr>
                                <td>TIE Defender must run Nimble Shields</td>
                            </tr>
                            <tr>
                                <td>Support cannot run Beacons</td>
                            </tr>
                            <tr>
                                <td>X-wings, TIE-fighters and TIE defenders cannot run ion missiles</td>
                            </tr>
                            <tr>
                                <td>Y-wings and TIE Bombers can only run one farming auxiliary (Goliath missiles or multi lock missiles but not both)</td>
                            </tr>
                            <tr>
                                <td>A Flask pilot must apply the component bans even when flying off role.</td>
                            </tr>
                            </tbody>
                        </table>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</main>
@endsection
