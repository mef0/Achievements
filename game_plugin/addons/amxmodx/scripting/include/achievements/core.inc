

/* 
 * Registers an achievement and makes it instantly available.
 * @param name => name of the achievement
 * @param desc => achievement description
 * @param column => unique column name, must be different from any other achievement
 * @param icon => achievement icon, for example ac_maniac.png, must be uploaded in the images/ac/ directory
 * @param paused => if true, the achievement will not be unlockable
 * @param value => whether or not the achievement requires value incrementing, such as kill 50 CTs, plant 50 bombs. Doesn't apply for things like
		kill 5 CTs in one round, because the value is being reset. In this case, the plugin needs to make the counting itself
 
 * @param tokens => how many tokens this achievement gives the player
 * @param max => only used if 'value' is set to true. All it does is make sure the max amount is displayed on the website correctly, the plugin needs to do the counting itself.
 * @param created => when was the achievement created? if 0, the current date will be detected
 * @param cat => the category of the achievement, 0 is uncategorized
 
 * @return: returns the achievement ID, which is then used for almost all other functions
 */
 
native ac_register( const name[], const desc[], const column[], const icon[], const bool: paused, const bool: value, tokens = 0, max = 0, created = 0, cat = 0 )

/*
 * Gives player with index 'player' achievement with id 'AchievementRowId'.
 * @return AchievementReturn values
 */
 
native AchievementReturn: ac_give( const player, const AchievementRowId )


/*
 * Removes an achievement 'AchievementRowId' from player with index 'player' 
 * @return AchievementReturn values
 */

native AchievementReturn: ac_remove( const player, const AchievementRowId )

/*
 * Returns whether the player has the achievement or not.
 * @return bool
 */

native bool: ac_has( const player, const AchievementRowId )

/*
 * Sets the value of player's achievement count to the set value. The achievement needs to have 'value' set to true.
 * @param type => Use one of the enumeration values from AchievementValueTypes. More info in documentation or const.inc.
 * @param value => any number the action should be done with
 * @return the total amount WITH THE CHANGES
 */

native ac_set_value( const player, const AchievementRowId, const AchievementValueTypes: type, value )

/*
 * Reads the value of player's achievement count. If possible, just cache the return of ac_set_value for increased optimisation.
 * @return integer >= 0 on success, -1 on failure
 */
native ac_get_value( const player, const AchievementRowId )

/* 
 * Checks whether or not a player is ready to work with the system.
 * Essential check that should be made each time an achievement operation occurs. 
 * You can create a global array with an index for each player, then set it to true on ac_player_ready forward call for better optimisation.
 * @return values from AchievementPlayerStatus enumeration
 */ 
 
native AchievementPlayerStatus: ac_get_player_status( const player )

/*
 * Retrieves the amount of total achievements loaded on the server the plugin is running. 
 It should be called only with at least two second delay after ac_init has been called, else it might return faulty results.
 * @param total => whether or not return the total achievements amount. If false, only available achievements are returned.
 * @return int ( ^ )
 */
 
native ac_get_total_achievements( const bool: total = false )
 
/*
 * Returns the total amount of achievements the player has.
 * @return int ( ^ )
 */
 
native ac_get_player_achievements( const player )


/*
 * Returns the amount of tokens player has.
 * @param total_tokens => whether or not return the total tokens. 
 * If set to false, the native will only return the tokens player gained from his last connection.
 * @return integer >= 0 on success, AC_ER_PLR_XXX constants on failure.
 */

native ac_get_tokens( const player, const bool: total_tokens )



/*
 * Sets the amount of tokens of the player. This shouldn't be called alongside ac_give, as the native already gives the tokens automatically.
 * @param type => any of the AchievementValueTypes enumeration
 * @param value => integer the action will be taken with
 * @return 1 on success, AC_ER_PLR_XXX constants on failure
 */

 
native ac_set_tokens( const player, AchievementValueTypes: type, const value )



/*
 * Copies the handle from main plugin to a child plugin, making it use the same MySQL connection
 * @return the handle ID usable in SQL_XXX natives, Handle: -1 on failure
 */

 
native Handle: ac_share_sql_handle( )


/*
 * Returns the amount of tokens one gets upon completing an achievement.
 * @return integer >= 0 on success, -1 on failure
 */

native ac_get_achievement_tokens( const AchievementRowId )


/*
 * Sets the pause status of an achievement; while paused, the achievement cannot be unlocked
 * @param pause => the pause status of achievement; true means paused
 * @param save => if true, the pause status will save to database; if not, the achievement will unpause after mapchange
 * @return 1 on success (when not saving), 2 on likely success (plugin doesn't know whether or not will be the SQL query executed properly), 0 on failure
 */

 native ac_set_availability( const AchievementRowId, bool: disable = true, bool: save = false )

 
 
/*
 * This native gets the servername currently being used.
 * @param Where => the string the value should be copied into
 * @param len => size of the string
 * @return AchievementReturn values
*/

native AchievementReturn: ac_get_server_string( const Where[ ], len = 31 )
 
 
/*
 * Returns the player's auth string.
 * @param id => player ID
 * @param Where => the string the value should be copied into
 * @param len => the max size of the string
 * @return AchievementReturn values
*/
 
native AchievementReturn: ac_get_player_auth( const id, const Where[ ], len = 63 )
 
 
/*
 * Returns the player's plrdata identifier. Used for URLs on the website (GET: plr)
 * @param id => player ID
 * @return int
*/

native ac_get_player_identifier( const id )
 
/* Returns the stats counter of a player.
 * @param id => player ID
 * @param Stats => stats ID, for example "kills" or "playtime"
 * @return int
*/

native ac_get_player_stats( const id, const Stats[ ] ) 
 
/* FORWARDS */


/*
 * Called when all the necessary steps have been done, such as establishing MySQL connection.
 * This is where you should register all achievements.
 */
 
forward ac_init( )

/*
 * Called whenever a player with index 'player' is loaded from the database and can work with the achievements system.
 */
 
forward ac_player_ready( player )

/*
 * Called whenever a player is gain an achievement.
 */
 
forward ac_player_givenac( player, achievement_id )
