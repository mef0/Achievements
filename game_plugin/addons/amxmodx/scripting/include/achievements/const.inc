enum AchievementReturn
{
	UNKNOWN = 0,
	SUCCESS,
	FAILURE
}

enum AchievementValueTypes
{
	ERROR = 0,
	INCREASE,	// increase by X
	DECREASE,	// decrease by X
	OVERWRITE	// change to X
}
	
enum AchievementPlayerStatus
{
	ERROR = 0,
	LOADED,			// player is loaded
	LOADED_NOT		// player is not loaded
}

enum AchievementStats
{
	STATS_KILLS,
	STATS_DEATHS,
	STATS_SUICIDES,
	STATS_PLAYTIME
}

enum AchievementForwardIds 
{
	FORWARD_INIT, 
	FORWARD_PLAYER_READY,
	FORWARD_PLAYER_GIVENAC
}

enum _: AchievementData
{
	_AcName[ 64 ],
	_AcDesc[ 256 ],
	_AcColumn[ 32 ],
	_AcIcon[ 256 ],
	bool: _AcAvailable,
	bool: _AcValue,
	_AcTokens,
	_AcMax,
	_AcCreated,
	_AcCat,
	_AcDatabaseID
}

enum ACDEBUG
{
	DEBUG_NONE,
	
	// outputs every native call
	DEBUG_NATIVE_CALLS = ( 1 << 0 ),
	
	// outputs each client command
	DEBUG_CLIENT_COMMANDS = ( 1 << 1 ),
	
	// outputs each client load/save data (from database)
	DEBUG_CLIENT_DATA = ( 1 << 2 ),
	
	// outputs each server load/save data (from database)
	DEBUG_SERVER_DATA = ( 1 << 3 ),
	
	// outputs detailed native calls, use together with DEBUG_NATIVE_CALLS
	DEBUG_NATIVE_DETAILS = ( 1 << 4 ),
	
	// prints the debug of public functions
	DEBUG_PUBLIC_FUNCTIONS = ( 1 << 5 ),
	
	// prints the debug of util/private functions
	DEBUG_PRIVATE_FUNCTIONS = ( 1 << 6 ),
	
	// prints a message if the client data was being saved but not loaded beforehand
	DEBUG_LOAD = ( 1 << 7 )
}


const AC_ER_PLR_NOTCONNECTED	= -5
