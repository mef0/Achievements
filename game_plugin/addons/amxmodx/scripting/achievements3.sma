#include <amxmodx>
#include <database_orm>
#include <achievements3>

const MAXPLAYERS = 32
LOLZ 2
new Class:g_hAcList, Class:g_hAcProgress
new Class:g_hStatList, Class:g_hStatProgress


new g_AcListColumnData[AcListColumns][ClassColumnStruct] = 
{
	{"identifier", Column_Varchar, 16},
	{"name", Column_Varchar, 128},
	{"description", Column_Varchar, 256},
	{"icon", Column_Varchar, 32},
	{"maxprogress", Column_Int, 11},
	{"points", Column_Int, 11},
	{"category", Column_Varchar, 16}
}


enum _:AcProgressColumns
{
	AcProgress_Identifier,
	AcProgress_Current,
	AcProgress_UnlockDate
}
new g_AcProgressColumnData[AcProgressColumns][ClassColumnStruct] = 
{
	{"identifier", Column_Varchar, 16},
	{"current", Column_Int, 11},
	{"unlockdate", Column_Int, 11}
}


enum _:StatListColumns
{
	StatList_Identifier,
	StatList_Name
}
new g_StatListColumnData[StatListColumns][ClassColumnStruct] = 
{
	{"identifier", Column_Varchar, 16},
	{"name", Column_Varchar, 64}
}


enum _:StatProgressColumns
{
	StatProgress_Identifier,
	StatProgress_Current
}
new g_StatProgressColumnData[StatProgressColumns][ClassColumnStruct] = 
{
	{"identifier", Column_Varchar, 16},
	{"current", Column_Int, 11}
}

new bool:g_Loaded[MAXPLAYERS + 1]

new g_CvarServer, g_CvarPrefix
public plugin_init()
{
	g_CvarServer = register_cvar("ac_server", "")
	g_CvarPrefix = register_cvar("ac_prefix", "")
}

public plugin_cfg()
{
	new Server[16], Prefix[16]
	get_pcvar_string(g_CvarServer, Server, charsmax(Server))
	get_pcvar_string(g_CvarPrefix, Prefix, charsmax(Prefix))
	
	if(!Server[0] || !Prefix[0])
	{
		set_fail_state("ac_server and/or ac_prefix cvars weren't changed. Please read the documentation.")
		return
	}
	
	new ClassName[32]
	
	
	/* ACHIEVEMENT LIST CLASS */
	formatex(ClassName, charsmax(ClassName), "%s_%s_aclist", Prefix, Server)
	
	new Array:AcList = ArrayCreate(ClassColumnStruct, AcListColumns)
	for(new i; i < AcListColumns; i++) 
	{
		ArrayPushArray(AcList, g_AcListColumnData[i])
	} 
	g_hAcList = CSRP_CreateStaticClass(ClassName, AcList, AcList_Identifier, "_Callback")
	
	
	/* ACHIEVEMENT PROGRESS CLASS */
	formatex(ClassName, charsmax(ClassName), "%s_%s_acprogress", Prefix, Server)
	
	new Array:AcProgress = ArrayCreate(ClassColumnStruct, AcProgressColumns)
	for(new i; i < AcProgressColumns; i++) 
	{
		ArrayPushArray(AcProgress, g_AcProgressColumnData[i])
	} 
	g_hAcProgress = CSRP_CreatePlayerClass(ClassName, AcProgress, AcProgress_Identifier, "_Callback")
	
	
	/* STATISTICS LIST CLASS */
	formatex(ClassName, charsmax(ClassName), "%s_%s_statslist", Prefix, Server)
	
	new Array:StatList = ArrayCreate(ClassColumnStruct, StatListColumns)
	for(new i; i < StatListColumns; i++) 
	{
		ArrayPushArray(StatList, g_StatListColumnData[i])
	} 
	g_hStatList = CSRP_CreateStaticClass(ClassName, StatList, StatList_Identifier, "_Callback")
	
	/* STATISTICS PROGRESS CLASS */
	formatex(ClassName, charsmax(ClassName), "%s_%s_statsprogress", Prefix, Server)
	
	new Array:StatProgress = ArrayCreate(ClassColumnStruct, StatProgressColumns)
	for(new i; i < StatProgressColumns; i++) 
	{
		ArrayPushArray(StatProgress, g_StatProgressColumnData[i])
	} 
	g_hStatProgress = CSRP_CreatePlayerClass(ClassName, StatProgress, StatProgress_Identifier, "_Callback")
}

public plugin_natives()
{
	register_library("achievements")
	
	register_native("AC_Register", 				"_AC_Register")
	register_native("AC_GetDetails", 			"_AC_GetDetails")
	register_native("AC_GetUserStage", 			"_AC_GetUserStage")
	register_native("AC_SetUserStage", 			"_AC_SetUserStage")
	register_native("AC_GetUserAchievements", 	"_AC_GetUserAchievements")
	register_native("AC_GetAllAchievements",	"_AC_GetAllAchievements")
	
	register_native("Stats_Register",			"_Stats_Register")
	register_native("Stats_GetName",			"_Stats_GetName")
	register_native("Stats_GetUserStage",		"_Stats_GetUserStage")
	register_native("Stats_SetUserStage",		"_Stats_SetUserStage")
	register_native("Stats_GetAllStatistics",	"_Stats_GetAllStatistics")
}

public Achievement:_AC_Register(Plugin, Params)
{
	if(Params != 7)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 7, Found: %d", Params)
		return Invalid_Achievement
	}
	
	new UniqueIdentifier[16], Name[128], Description[256], Icon[32], MaxProgress, Points, Category[16]
	
	get_string(1, UniqueIdentifier, charsmax(UniqueIdentifier))
	get_string(2, Name, charsmax(Name))
	get_string(3, Description, charsmax(Description))
	get_string(4, Icon, charsmax(Icon))
	get_string(5, Category, charsmax(Category))
	MaxProgress = get_param(6)
	Points = get_param(7)
	
	new Position, Array:AchievementData = CSRP_FindInStaticClassString(g_hAcList, UniqueIdentifier, Position)
	
	if(AchievementData == Invalid_Array)
	{
		AchievementData = ArrayCreate(256, AcListColumns)
		
		ArrayPushString(AchievementData, UniqueIdentifier)
		ArrayPushString(AchievementData, Name)
		ArrayPushString(AchievementData, Description)
		ArrayPushString(AchievementData, Icon)
		ArrayPushString(AchievementData, Category)
		ArrayPushCell(AchievementData, MaxProgress)
		ArrayPushCell(AchievementData, Points)
		
		// we add 1 because 0 is Invalid_Achievement
		return Achievement:(CSRP_PushStaticClassItem(g_hAcList, AchievementData) + 1)
	}
	
	ArraySetString(AchievementData, 2, Name)
	ArraySetString(AchievementData, 3, Description)
	ArraySetString(AchievementData, 4, Icon)
	ArraySetString(AchievementData, 5, Category)
	ArraySetCell(AchievementData, 6, MaxProgress)
	ArraySetCell(AchievementData, 7, Points)
	
	// we add 1 because 0 is Invalid_Achievement
	return Achievement:(Position + 1)
}

public Array:_AC_GetDetails(Plugin, Params)
{
	if(Params != 1)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 1, Found: %d", Params)
		return Invalid_Array
	}
	
	new Achievement:Pointer
	
	if(Pointer == Invalid_Achievement)
	{
		log_error(AMX_ERR_NATIVE, "Invalid achievement pointer %d.", Pointer)
		return Invalid_Array
	}
	
	new Array:AchievementData = CSRP_GetStaticClassItem(g_hAcList, _:Pointer - 1)
	if(AchievementData == Invalid_Array)
	{
		log_error(AMX_ERR_NATIVE, "Invalid achievement pointer %d.", Pointer)
	}
	
	return AchievementData
}

public AchievementStage:_AC_GetUserStage(Plugin, Params)
{
	if(Params != 4)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 4, Found: %d", Params)
		return AcStage_Error
	}
	
	new id = get_param(1)
	if(!g_Loaded[id])
	{
		return AcStage_Error
	}
	
	new Achievement:Pointer = Achievement:get_param(2)
	if(Pointer == Invalid_Achievement)
	{
		log_error(AMX_ERR_NATIVE, "Invalid achievement pointer %d.", Pointer)
		return AcStage_Error
	}
	
	new Array:AchievementData = CSRP_GetStaticClassItem(g_hAcList, _:Pointer - 1)
	if(AchievementData == Invalid_Array)
	{
		log_error(AMX_ERR_NATIVE, "Invalid achievement pointer %d.", Pointer)
		return AcStage_Error
	}
	new UniqueIdentifier[16]
	ArrayGetString(AchievementData, AcList_Identifier, UniqueIdentifier, charsmax(UniqueIdentifier))
	
	new Array:PlayerAchievementData = CSRP_FindInPlayerClassString(g_hAcProgress, id, UniqueIdentifier)
	
	if(PlayerAchievementData == Invalid_Array)
	{
		return AcStage_Locked
	}
	
	new UnlockDate = ArrayGetCell(PlayerAchievementData, AcProgress_UnlockDate)
	new Progress = ArrayGetCell(PlayerAchievementData, AcProgress_Current)
	
	if(UnlockDate == 0)
	{
		set_param_byref(3, Progress)
		return AcStage_Locked
	}
	
	set_param_byref(3, Progress)
	set_param_byref(4, UnlockDate)
	
	return AcStage_Unlocked
}

public AchievementStage:_AC_SetUserStage(Plugin, Params)
{
	if(Params != 3)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 3, Found: %d", Params)
		return AcStage_Error
	}
	
	new id = get_param(1)
	if(!g_Loaded[id])
	{
		return AcStage_Error
	}
	
	new Achievement:Pointer = Achievement:get_param(2)
	if(Pointer == Invalid_Achievement)
	{
		log_error(AMX_ERR_NATIVE, "Invalid achievement pointer %d.", Pointer)
		return AcStage_Error
	}
	
	new Array:AchievementData = CSRP_GetStaticClassItem(g_hAcList, _:Pointer - 1)
	if(AchievementData == Invalid_Array)
	{
		log_error(AMX_ERR_NATIVE, "Invalid achievement pointer %d.", Pointer)
		return AcStage_Error
	}
	new UniqueIdentifier[16]
	ArrayGetString(AchievementData, AcList_Identifier, UniqueIdentifier, charsmax(UniqueIdentifier))
	
	
	new Progress = get_param(3)
	new Max = ArrayGetCell(AchievementData, AcList_MaxProgress)
	new bool:UnlockIt = Progress >= Max
	
	new Array:PlayerAchievementData = CSRP_FindInPlayerClassString(g_hAcProgress, id, UniqueIdentifier)
	
	if(PlayerAchievementData == Invalid_Array)
	{
		PlayerAchievementData = ArrayCreate(16, AcProgressColumns)
		ArrayPushString(PlayerAchievementData, UniqueIdentifier)
		ArrayPushCell(PlayerAchievementData, Progress)
		if(UnlockIt)
		{
			ArrayPushCell(PlayerAchievementData, get_systime())
			CSRP_PushPlayerClassItem(g_hAcProgress, id, PlayerAchievementData)
			// Add the unlock announce message!
            client_print(0, print_chat, "Achievement unlocked!")
			return AcStage_Unlocked
		}
		
		CSRP_PushPlayerClassItem(g_hAcProgress, id, PlayerAchievementData)
		
		ArrayPushCell(PlayerAchievementData, 0)
		return AcStage_Locked
	}
	
	new PreviousProgress = ArrayGetCell(PlayerAchievementData, AcProgress_Current)
	ArraySetCell(PlayerAchievementData, AcProgress_Current, Progress)
	if(UnlockIt)
	{
		if(PreviousProgress < Max)
		{
			ArraySetCell(PlayerAchievementData, AcProgress_UnlockDate, get_systime())
			// Add the unlock announce message!
            client_print(0, print_chat, "Achievement unlocked!")
		}
		return AcStage_Unlocked
	}
	ArraySetCell(PlayerAchievementData, AcProgress_UnlockDate, 0)
	
	return AcStage_Locked
}
	
public _AC_GetUserAchievements(Plugin, Params)
{
	if(Params != 2)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 2, Found: %d", Params)
		return 0
	}
	
	new id = get_param(1)
	
	if(!g_Loaded[id])
	{
		return 0
	}
	
	new Array:PlayerAchievements = CSRP_GetPlayerClassData(g_hAcProgress, id)
	new Array:PlayerOwnedTotal = ArrayCreate()
	
	new Array:CurArray, UniqueIdentifier[16], Position, Progress
	for(new i; i < ArraySize(PlayerAchievements); i++)
	{
		CurArray = Array:ArrayGetCell(PlayerAchievements, i)
		
		if(CurArray == Invalid_Array)
		{
			continue
		}
		
		ArrayGetString(CurArray, AcProgress_Identifier, UniqueIdentifier, charsmax(UniqueIdentifier))
		Progress = ArrayGetCell(CurArray, AcProgress_Current)
		CurArray = CSRP_FindInStaticClassString(g_hAcList, UniqueIdentifier, Position)
		
		if(CurArray == Invalid_Array)
		{
			continue
		}
		
		if(Progress >= _:ArrayGetCell(CurArray, AcList_MaxProgress))
		{
			ArrayPushCell(PlayerOwnedTotal, Position)
		}
	}
	
	if(get_param_byref(2) != _:Invalid_Array)
	{
		set_param_byref(2, _:PlayerOwnedTotal)
	}
	
	return ArraySize(PlayerOwnedTotal)
}

public _AC_GetAllAchievements(Plugin, Params)
{
	if(Params != 1)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 1, Found: %d", Params)
		return 0
	}
	
	new Array:AllAchievements = CSRP_GetStaticClassData(g_hAcList)
	new Array:AchievementIDs = ArrayCreate()
	new Array:TempData
	
	for(new i = 1; i <= ArraySize(AllAchievements); i++)
	{
		TempData = CSRP_GetStaticClassItem(g_hAcList, i - 1)
		
		if(TempData != Invalid_Array)
		{
			ArrayPushCell(AchievementIDs, i)
		}
	}
	
	if(get_param_byref(1) != _:Invalid_Array)
	{
		set_param_byref(1, _:AchievementIDs)
	}
	
	return ArraySize(AchievementIDs)
}
	
public _Stats_Register(Plugin, Params)
{
	if(Params != 2)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 2, Found: %d", Params)
		return 0
	}
	
	new UniqueIdentifier[16], Name[64]
	get_string(1, UniqueIdentifier, charsmax(UniqueIdentifier))
	get_string(2, Name, charsmax(Name))
	
	new Array:StatsData = CSRP_FindInStaticClassString(g_hStatList, UniqueIdentifier)
	
	if(StatsData == Invalid_Array)
	{
		StatsData = ArrayCreate(ClassColumnStruct, StatListColumns)
		ArrayPushString(StatsData, UniqueIdentifier)
		ArrayPushString(StatsData, Name)
	}
	else
	{
		ArraySetString(StatsData, StatList_Name, Name)
	}
	
	return 1
}

public _Stats_GetName(Plugin, Params)
{
	if(Params != 3)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 3, Found: %d", Params)
		return 0
	}
	
	new UniqueIdentifier[16]
	get_string(1, UniqueIdentifier, charsmax(UniqueIdentifier))
	
	new Array:StatsData = CSRP_FindInStaticClassString(g_hStatList, UniqueIdentifier)
	
	if(StatsData == Invalid_Array)
	{
		return 0
	}
	
	new Name[64]
	ArrayGetString(StatsData, StatList_Name, Name, charsmax(Name))
	
	set_string(2, Name, get_param(3))
	return 1
}

public _Stats_SetUserStage(Plugin, Params)
{
	if(Params != 3)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 3, Found: %d", Params)
		return 0
	}
	
	new id = get_param(1)
	if(!g_Loaded[id])
	{
		return 0
	}
	
	new UniqueIdentifier[16], Progress
	get_string(2, UniqueIdentifier, charsmax(UniqueIdentifier))
	Progress = get_param(3)
	
	new Array:PlayerStatsData = CSRP_FindInPlayerClassString(g_hStatProgress, id, UniqueIdentifier)
	if(PlayerStatsData != Invalid_Array)
	{
		ArraySetCell(PlayerStatsData, StatProgress_Current, Progress)
		return 1
	}
	
	PlayerStatsData = ArrayCreate(16, StatProgressColumns)
	ArrayPushString(PlayerStatsData, UniqueIdentifier)
	ArrayPushCell(PlayerStatsData, Progress)
	
	CSRP_PushPlayerClassItem(g_hStatProgress, id, PlayerStatsData)
	return 1
}

public _Stats_GetUserStage(Plugin, Params)
{
	if(Params != 2)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 2, Found: %d", Params)
		return 0
	}
	
	new id = get_param(1)
	if(!g_Loaded[id])
	{
		return 0
	}
	
	new UniqueIdentifier[16]
	get_string(2, UniqueIdentifier, charsmax(UniqueIdentifier))
	
	new Array:PlayerStatsData = CSRP_FindInPlayerClassString(g_hStatProgress, id, UniqueIdentifier)
	if(PlayerStatsData != Invalid_Array)
	{
		return ArrayGetCell(PlayerStatsData, StatProgress_Current)
	}
	
	return 0
}

public _Stats_GetAllStatistics(Plugin, Params)
{
	if(Params != 1)
	{
		log_error(AMX_ERR_NATIVE, "Unexpected amount of parameters. Expected: 1, Found: %d", Params)
		return 0
	}
	
	new Array:AllStatistics = CSRP_GetStaticClassData(g_hStatList)
	new Size = ArraySize(AllStatistics)
	
	if(get_param_byref(1) == _:Invalid_Array)
	{
		return Size
	}
	
	new Array:StatIDs = ArrayCreate(16)
	new Array:CurArray
	
	new UniqueIdentifier[16]
	
	for(new i; i < Size; i++)
	{
		CurArray = Array:ArrayGetCell(AllStatistics, i)
		
		if(CurArray == Invalid_Array)
		{
			continue
		}
		
		ArrayGetString(CurArray, StatList_Identifier, UniqueIdentifier, charsmax(UniqueIdentifier))
		ArrayPushString(StatIDs, UniqueIdentifier)
	}
	
	set_param_byref(1, _:StatIDs)
	return Size
}