VERSION 5.00
Begin VB.Form frmAddUser 
   BorderStyle     =   3  'Fixed Dialog
   Caption         =   "Add User Wizard"
   ClientHeight    =   3195
   ClientLeft      =   45
   ClientTop       =   375
   ClientWidth     =   6030
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MDIChild        =   -1  'True
   MinButton       =   0   'False
   ScaleHeight     =   3195
   ScaleWidth      =   6030
   ShowInTaskbar   =   0   'False
   Begin VB.Frame Frame1 
      BackColor       =   &H00FFFFC0&
      BorderStyle     =   0  'None
      Height          =   5775
      Left            =   0
      TabIndex        =   0
      Top             =   0
      Width           =   6375
      Begin VB.OptionButton normal 
         BackColor       =   &H00FFFFC0&
         Caption         =   "Normal"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   495
         Left            =   2520
         TabIndex        =   5
         Top             =   1800
         Value           =   -1  'True
         Width           =   1695
      End
      Begin VB.OptionButton root 
         BackColor       =   &H00FFFFC0&
         Caption         =   "Root"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   495
         Left            =   4440
         TabIndex        =   4
         Top             =   1800
         Width           =   1095
      End
      Begin VB.TextBox password 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   2520
         TabIndex        =   3
         Top             =   1200
         Width           =   3135
      End
      Begin VB.CommandButton create 
         BackColor       =   &H00C0FFC0&
         Caption         =   "Create User"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   1800
         MaskColor       =   &H00000080&
         Style           =   1  'Graphical
         TabIndex        =   2
         Top             =   2400
         Width           =   2295
      End
      Begin VB.TextBox username 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   2520
         TabIndex        =   1
         Top             =   600
         Width           =   3135
      End
      Begin VB.Label passwordlabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Password"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   8
         Top             =   1200
         Width           =   1935
      End
      Begin VB.Label usertypelable 
         BackStyle       =   0  'Transparent
         Caption         =   "User Type"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   7
         Top             =   1800
         Width           =   1815
      End
      Begin VB.Label usernamelabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Username"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   6
         Top             =   600
         Width           =   1815
      End
   End
End
Attribute VB_Name = "frmAddUser"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Dim ustype, errreply As String
Private Sub create_Click()
    If username.Text = "" Then
        errreply = MsgBox("Please Enter New User's Username", vbCritical + vbOKOnly, "Error")
        username.SetFocus
    ElseIf password.Text = "" Then
        errreply = MsgBox("Please Enter New User's Password", vbCritical + vbOKOnly, "Error")
        password.SetFocus
    Else
        Set rsUser = Nothing
        Set rsUser = New ADODB.Recordset
        errreply = "SELECT * FROM usertable WHERE Username LIKE '" & username.Text & "'"
        rsUser.Open errreply, con, adOpenForwardOnly, adLockOptimistic
        If rsUser.EOF = True Then
            If normal.Value = True Then
                ustype = "Normal"
            Else
                ustype = "Root"
            End If
            Set rsUser = Nothing
            Set rsUser = New ADODB.Recordset
            Set rsUser = con.Execute("INSERT INTO usertable VALUES('" & username.Text & "','" & password.Text & "','" & ustype & "')")
            errreply = MsgBox("New User Added", vbInformation + vbOKOnly, "Finished")
            Unload Me
        Else
            errreply = MsgBox("Username must be Unique", vbCritical + vbOKOnly, "Error")
        End If
        Set rsUser = Nothing
        Set rsUser = New ADODB.Recordset
    End If
End Sub
