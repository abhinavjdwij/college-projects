VERSION 5.00
Begin VB.Form frmDdc 
   BorderStyle     =   3  'Fixed Dialog
   Caption         =   "Employee Deductions"
   ClientHeight    =   3690
   ClientLeft      =   45
   ClientTop       =   375
   ClientWidth     =   8520
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MDIChild        =   -1  'True
   MinButton       =   0   'False
   ScaleHeight     =   3690
   ScaleWidth      =   8520
   ShowInTaskbar   =   0   'False
   Begin VB.Frame Frame1 
      BackColor       =   &H00FFFFC0&
      BorderStyle     =   0  'None
      Height          =   4620
      Left            =   0
      TabIndex        =   0
      Top             =   0
      Width           =   9000
      Begin VB.TextBox ictax 
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
         Left            =   5160
         TabIndex        =   5
         Top             =   1200
         Width           =   3135
      End
      Begin VB.TextBox empID 
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
         Left            =   5160
         TabIndex        =   4
         Top             =   600
         Width           =   3135
      End
      Begin VB.TextBox absent 
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
         Left            =   5160
         TabIndex        =   3
         Top             =   2400
         Width           =   3135
      End
      Begin VB.TextBox srvtax 
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
         Left            =   5160
         TabIndex        =   2
         Top             =   1800
         Width           =   3135
      End
      Begin VB.CommandButton update 
         BackColor       =   &H00C0FFC0&
         Caption         =   "Update"
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
         Left            =   2880
         MaskColor       =   &H00000080&
         Style           =   1  'Graphical
         TabIndex        =   1
         Top             =   3000
         Width           =   2295
      End
      Begin VB.Label iclabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Income Tax"
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
         TabIndex        =   9
         Top             =   1200
         Width           =   3015
      End
      Begin VB.Label srvlabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Service Tax"
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
         Top             =   1800
         Width           =   3495
      End
      Begin VB.Label empIDlabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Employee ID"
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
         Top             =   600
         Width           =   1815
      End
      Begin VB.Label abslevel 
         BackStyle       =   0  'Transparent
         Caption         =   "Absence Deduction"
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
         Top             =   2400
         Width           =   3015
      End
   End
End
Attribute VB_Name = "frmDdc"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Dim errreply As String

Private Sub Form_Load()
    ictax.Enabled = False
    srvtax.Enabled = False
    absent.Enabled = False
    update.Enabled = False
End Sub

Private Sub empID_KeyPress(KeyAscii As Integer)
    If KeyAscii = 13 Then
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        errreply = "SELECT * FROM paytable WHERE empID LIKE '" & empID.Text & "'"
        rsPay.Open errreply, con, adOpenForwardOnly, adLockOptimistic
        If rsPay.EOF = True Then
            errreply = MsgBox("Invalid Employee ID", vbExclamation + vbOKOnly, "Error")
            empID.SetFocus
        Else
            empID.Enabled = False
            ictax.Text = rsPay!ictax
            srvtax.Text = rsPay!srvtax
            absent.Text = rsPay!absent
            ' Enable all other inputs now
            ictax.Enabled = True
            srvtax.Enabled = True
            absent.Enabled = True
            update.Enabled = True
        End If
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
    End If
End Sub

Private Sub update_Click()
    If ictax.Text = "" Or (Not (IsNumeric(ictax.Text))) Or Val(ictax.Text) < 0 Or Val(ictax.Text) > 30 Then
        errreply = MsgBox("Please Enter Income Tax value between 0 to 30", vbCritical + vbOKOnly, "Error")
        ictax.SetFocus
    ElseIf srvtax.Text = "" Or (Not (IsNumeric(srvtax.Text))) Or Val(srvtax.Text) < 0 Or Val(srvtax.Text) > 15 Then
        errreply = MsgBox("Please Enter Service Tax value between 0 to 15", vbCritical + vbOKOnly, "Error")
        srvtax.SetFocus
    ElseIf absent.Text = "" Or (Not (IsNumeric(absent.Text))) Or Val(absent.Text) < 0 Or Val(absent.Text) > 30 Then
        errreply = MsgBox("Please Enter Absent value between 0 to 30", vbCritical + vbOKOnly, "Error")
        absent.SetFocus
    Else
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        Set rsPay = con.Execute("UPDATE paytable SET ictax = '" & ictax.Text & "' WHERE empID = '" & empID.Text & "'")
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        Set rsPay = con.Execute("UPDATE paytable SET srvtax = '" & srvtax.Text & "' WHERE empID = '" & empID.Text & "'")
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        Set rsPay = con.Execute("UPDATE paytable SET absent = '" & absent.Text & "' WHERE empID = '" & empID.Text & "'")
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        errreply = MsgBox("Employee Information Updated", vbInformation + vbOKOnly, "Finished")
        Unload Me
        End If
    Set rsPay = Nothing
    Set rsPay = New ADODB.Recordset
End Sub

